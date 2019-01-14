<?php

namespace App\Tests;

use App\Entity\Administrator;
use App\Repository\AdministratorRepository;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;
use Webmozart\Assert\Assert;

abstract class HttpTestCase extends WebTestCase
{
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

    protected function authenticateAdmin(string $email): void
    {
        /** @var Administrator $user */
        $admin = $this->get(AdministratorRepository::class)->findOneBy(['email' => $email]);
        Assert::notNull($admin, 'Administrator not found for email '.$email);

        $this->authenticate($admin, 'admin', 'admin');
    }

    private function authenticate(UserInterface $user, string $firewallName, string $firewallContext): void
    {
        $session = $this->client->getContainer()->get('session');

        $token = new PostAuthenticationGuardToken($user, $firewallName, $user->getRoles());
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $this->client->getCookieJar()->set(new Cookie($session->getName(), $session->getId()));
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
}
