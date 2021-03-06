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
            'email' => 'unknown@mobilisation-eu.localhost',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ];

        // valid email account and bad password
        yield [
            'email' => 'superadmin@mobilisation-eu.localhost',
            'password' => 'bad_password',
        ];
    }

    /**
     * @dataProvider provideBadCredentials
     */
    public function testLoginFailure(string $email, string $password): void
    {
        $this->client->request('GET', '/admin/login');
        $this->assertResponseSuccessful();

        $this->client->submitForm('Sign in', [
            'emailAddress' => $email,
            'password' => $password,
        ]);
        $this->assertIsRedirectedTo('/admin/login');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertEquals($email, $crawler->selectButton('Sign in')->form()->get('emailAddress')->getValue());
    }

    public function testLoginSuccess(): void
    {
        $this->client->request('GET', '/admin/login');
        $this->assertResponseSuccessful();

        $this->client->submitForm('Sign in', [
            'emailAddress' => 'superadmin@mobilisation-eu.localhost',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]);
        $this->assertIsRedirectedTo('/admin/dashboard');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertGreaterThan(0, $crawler->filter('a:contains("Dashboard")')->count());
    }

    public function testLoginTwoFactor(): void
    {
        $this->client->request('GET', '/admin/login');
        $this->assertResponseSuccessful();

        $this->client->submitForm('Sign in', [
            'emailAddress' => 'admin@mobilisation-eu.localhost',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]);
        $this->assertIsRedirectedTo('/admin/dashboard');

        $this->client->followRedirect();
        $this->assertIsRedirectedTo($this->getAbsoluteUrl('/admin/2fa'));

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();

        $this->client->click($crawler->selectLink('Cancel')->link());
        $this->assertIsRedirectedTo($this->getAbsoluteUrl('/admin/login'));

        $this->client->followRedirect();
        $this->assertResponseSuccessful();
    }
}
