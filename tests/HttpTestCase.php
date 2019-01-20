<?php

namespace App\Tests;

use App\Entity\Actor;
use App\Entity\Administrator;
use App\Repository\ActorRepository;
use App\Repository\AdministratorRepository;
use Coduo\PHPMatcher\PHPUnit\PHPMatcherAssertions;
use Enqueue\Client\TraceableProducer;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;
use Webmozart\Assert\Assert;

abstract class HttpTestCase extends WebTestCase
{
    use PHPMatcherAssertions;

    protected const UUID_PATTERN = '[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}';

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

        foreach ($patterns as $pattern) {
            $this->assertContains($pattern, $this->client->getResponse()->getContent());
        }
    }

    protected function assertIsRedirectedTo(string $pattern): void
    {
        $response = $this->client->getResponse();

        $this->assertTrue(
            $response->isRedirection(),
            'Expected redirection but got status code '.$response->getStatusCode().' instead.'
        );

        $this->assertMatchesPattern($pattern, $response->headers->get('Location'));
    }

    protected function assertResponseSuccessFul(): void
    {
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    protected function assertMailSent(array $expectedMail): void
    {
        if (!isset($expectedMail['to'])) {
            throw new \InvalidArgumentException('Can\'t find mail with no recipient.');
        }

        foreach ($this->getMessagesForTopic('mail') as $mail) {
            if ($expectedMail['to'] === $mail['to']) {
                $this->assertMatchesPattern($expectedMail['subject'], $mail['subject']);
                $this->assertMatchesPattern($expectedMail['body'], $mail['body']);

                foreach (['from', 'cc', 'bcc'] as $strictComparison) {
                    if (isset($expectedMail[$strictComparison])) {
                        $this->assertSame($expectedMail[$strictComparison], $mail[$strictComparison]);
                    }
                }

                return;
            }
        }

        $this->fail(sprintf('No mail for "%s" could be found.', $expectedMail['to']));
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

    protected function getAbsoluteUrl(string $path): string
    {
        return $this->client->getRequest()->getSchemeAndHttpHost().$path;
    }

    protected function authenticateActor(string $email): void
    {
        /** @var Actor $actor */
        $actor = $this->getActorRepository()->findOneBy(['emailAddress' => $email]);
        Assert::notNull($actor, 'Actor not found for email '.$actor);

        $this->authenticate($actor, 'main', 'main_context');
    }

    protected function authenticateAdmin(string $email): void
    {
        /** @var Administrator $user */
        $admin = $this->get(AdministratorRepository::class)->findOneBy(['emailAddress' => $email]);
        Assert::notNull($admin, 'Administrator not found for email '.$email);

        $this->authenticate($admin, 'admin', 'main_context');
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
