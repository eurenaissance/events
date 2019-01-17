<?php

namespace Test\App\Controller\Admin;

use App\DataFixtures\AdministratorFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class SecurityControllerTest extends HttpTestCase
{
    public function provideBadCredentials(): iterable
    {
        yield [
            'email' => 'unknown@mobilisation.eu',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ];

        yield [
            'email' => 'superadmin@mobilisation-eu.code',
            'password' => 'bad_password',
        ];
    }

    /**
     * @dataProvider provideBadCredentials
     */
    public function testLoginFailure(string $email, string $password): void
    {
        $crawler = $this->client->request('GET', '/admin/login');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => $email,
            'password' => $password,
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/admin/login'));

        $crawler = $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertEquals($email, $crawler->selectButton('Sign in')->form()->get('emailAddress')->getValue());
    }

    public function testLoginSuccess(): void
    {
        $crawler = $this->client->request('GET', '/admin/login');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'superadmin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/admin/dashboard'));

        $crawler = $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertGreaterThan(0, $crawler->filter('a:contains("Dashboard")')->count());
    }

    public function testLoginTwoFactor(): void
    {
        $crawler = $this->client->request('GET', '/admin/login');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'admin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/admin/dashboard'));

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isRedirect($this->client->getRequest()->getSchemeAndHttpHost().'/admin/2fa'));

        $crawler = $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->click($crawler->selectLink('Cancel')->link());
        self::assertTrue($this->client->getResponse()->isRedirect($this->client->getRequest()->getSchemeAndHttpHost().'/admin/login'));

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
    }
}
