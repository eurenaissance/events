<?php

namespace App\Tests;

use App\Entity\Actor;
use App\Entity\Administrator;
use App\Repository\ActorRepository;
use App\Repository\AdministratorRepository;
use App\Repository\EventRepository;
use App\Repository\GroupRepository;
use Coduo\PHPMatcher\PHPUnit\PHPMatcherAssertions;
use Enqueue\Client\TraceableProducer;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;
use Webmozart\Assert\Assert;

abstract class HttpTestCase extends WebTestCase
{
    use PHPMatcherAssertions;

    protected const UUID_PATTERN = '[0-9A-Fa-f]{8}-([0-9A-Fa-f]{4}-){3}[0-9A-Fa-f]{12}';

    /**
     * @var Client
     */
    protected $client;

    protected function setUp()
    {
        $this->client = static::createClient();
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->client = null;
    }

    /**
     * @param array|string $patterns
     */
    protected function assertResponseContains($patterns): void
    {
        if (is_string($patterns)) {
            $patterns = [$patterns];
        }

        $response = $this->client->getResponse();

        foreach ($patterns as $pattern) {
            $this->assertContains($pattern, $response->getContent());
        }
    }

    protected function assertIsRedirectedTo(string $pattern, string $message = null): void
    {
        $response = $this->client->getResponse();

        $this->assertTrue($response->isRedirection(), $message ?? sprintf(
            'Expected redirection but got status code %d instead.',
            $response->getStatusCode()
        ));

        $this->assertMatchesPattern($pattern, $response->headers->get('Location'));
    }

    protected function assertResponseSuccessFul(string $message = null): void
    {
        $response = $this->client->getResponse();

        $this->assertTrue($response->isSuccessful(), $message ?? sprintf(
            'Expected status code 200, but got %d instead.',
            $response->getStatusCode()
        ));
    }

    protected function assertNotFoundResponse(string $message = null): void
    {
        $response = $this->client->getResponse();

        $this->assertTrue($response->isNotFound(), $message ?? sprintf(
            'Expected status code 404, but got %d instead.',
            $response->getStatusCode()
        ));
    }

    protected function assertAccessDeniedResponse(string $message = null): void
    {
        $response = $this->client->getResponse();

        $this->assertTrue($response->isForbidden(), $message ?? sprintf(
            'Expected status code 403, but got %d instead.',
            $response->getStatusCode()
        ));
    }

    protected function assertJsonResponse(array $expectedContent = null): void
    {
        $response = $this->client->getResponse();

        $this->assertResponseSuccessFul();
        $this->assertSame('application/json', $response->headers->get('Content-Type'));
        $this->assertNotEmpty($response->getContent());
        $this->assertJson($response->getContent());

        if ($expectedContent) {
            $this->assertMatchesPattern(\GuzzleHttp\json_encode($expectedContent), $response->getContent());
        }
    }

    protected function assertMailSent(array $expectedMail): void
    {
        if (!isset($expectedMail['to'])) {
            throw new \InvalidArgumentException('Can\'t find mail with no recipient.');
        }

        foreach ($this->getMessagesForTopic('mail') as $mail) {
            if ($expectedMail['to'] === $mail['to']) {
                foreach (['subject', 'body'] as $patternComparison) {
                    if (isset($expectedMail[$patternComparison])) {
                        $this->assertMatchesPattern($expectedMail[$patternComparison], $mail[$patternComparison]);
                    }
                }

                foreach (['from', 'cc', 'bcc'] as $strictComparison) {
                    if (isset($expectedMail[$strictComparison])) {
                        $this->assertSame($expectedMail[$strictComparison], $mail[$strictComparison]);
                    }
                }

                $this->addToAssertionCount(1);

                return;
            }
        }

        $this->fail(sprintf('No mail for "%s" could be found.', $expectedMail['to']));
    }

    protected function assertMailSentTo(string $email): void
    {
        $this->assertMailSent(['to' => $email]);
    }

    protected function assertNoMailSent(): void
    {
        $this->assertEmpty($this->getMessagesForTopic('mail'));
    }

    /**
     * Helper to get a service.
     *
     * @param string $name
     *
     * @return mixed
     */
    protected function get(string $name)
    {
        return self::$container->get($name);
    }

    protected function getActorRepository(): ActorRepository
    {
        return $this->get(ActorRepository::class);
    }

    protected function getGroupRepository(): GroupRepository
    {
        return $this->get(GroupRepository::class);
    }

    protected function getEventRepository(): EventRepository
    {
        return $this->get(EventRepository::class);
    }

    protected function getAbsoluteUrl(string $path): string
    {
        return $this->client->getRequest()->getSchemeAndHttpHost().$path;
    }

    protected function authenticateActor(string $email): void
    {
        /** @var Actor $actor */
        $actor = $this->getActorRepository()->findOneByEmail($email);
        Assert::notNull($actor, 'Actor not found for email '.$actor);

        $this->authenticate($actor, 'main', 'main_context');
    }

    protected function authenticateAdmin(string $email): void
    {
        /** @var Administrator $user */
        $admin = $this->get(AdministratorRepository::class)->findOneByEmail($email);
        Assert::notNull($admin, 'Administrator not found for email '.$email);

        $this->authenticate($admin, 'admin', 'main_context');
    }

    protected function getAdminFormUniqId(Form $form): string
    {
        $url = parse_url($form->getFormNode()->getAttribute('action'));
        $this->assertArrayHasKey('query', $url, 'Could not find query parameters in action to determine form uniqid.');

        $parameters = [];
        parse_str($url['query'], $parameters);
        $this->assertArrayHasKey('uniqid', $parameters, 'Could not find "uniqid" parameter in query to determine form uniqid.');

        return $parameters['uniqid'];
    }

    protected function submitAdminForm(string $button, array $fieldValues = []): Crawler
    {
        $form = $this->client->getCrawler()->selectButton($button)->form();

        return $this->client->submit($form, [
            $this->getAdminFormUniqId($form) => $fieldValues,
        ]);
    }

    protected function createFormDate(string $time): array
    {
        $date = new \DateTime($time);

        return [
            'year' => (int) $date->format('Y'),
            'month' => (int) $date->format('m'),
            'day' => (int) $date->format('d'),
        ];
    }

    protected function createFormDateTime(string $time): array
    {
        $date = new \DateTime($time);

        return [
            'date' => [
                'year' => (int) $date->format('Y'),
                'month' => (int) $date->format('m'),
                'day' => (int) $date->format('d'),
            ],
            'time' => [
                'hour' => (int) $date->format('H'),
                'minute' => 0,
            ],
        ];
    }

    private function authenticate(UserInterface $user, string $firewallName, string $firewallContext): void
    {
        $session = $this->client->getContainer()->get('session');

        $token = new PostAuthenticationGuardToken($user, $firewallName, $user->getRoles());
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $this->client->getCookieJar()->set(new Cookie($session->getName(), $session->getId()));
    }

    private function getClientProducer(): TraceableProducer
    {
        return $this->client->getContainer()->get('enqueue.client.default.producer');
    }

    private function getMessagesForTopic(string $topic): array
    {
        return array_map(function (array $trace) {
            return $trace['body'];
        }, $this->getClientProducer()->getTopicTraces($topic));
    }
}
