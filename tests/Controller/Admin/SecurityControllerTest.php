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
        // unknown email and known password
        yield [
            'email' => 'unknown@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ];

        // valid email account and bad password
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
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => $email,
            'password' => $password,
        ]));
        $this->assertIsRedirectedTo('/admin/login');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertEquals($email, $crawler->selectButton('Sign in')->form()->get('emailAddress')->getValue());
    }

    public function testLoginSuccess(): void
    {
        $crawler = $this->client->request('GET', '/admin/login');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'superadmin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        $this->assertIsRedirectedTo('/admin/dashboard');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertGreaterThan(0, $crawler->filter('a:contains("Dashboard")')->count());
    }

    public function testLoginTwoFactor(): void
    {
        $crawler = $this->client->request('GET', '/admin/login');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'admin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        $this->assertIsRedirectedTo('/admin/dashboard');

        $this->client->followRedirect();
        $this->assertIsRedirectedTo($this->getAbsoluteUrl('/admin/2fa'));

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $this->client->click($crawler->selectLink('Cancel')->link());
        $this->assertIsRedirectedTo($this->getAbsoluteUrl('/admin/login'));

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
    }
}
