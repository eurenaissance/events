<?php

namespace Test\App\Controller\Admin;

use App\DataFixtures\AdministratorFixtures;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group functional
 */
class SecurityControllerTest extends WebTestCase
{
    public function testLogin(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/login');
        self::assertTrue($client->getResponse()->isSuccessful());

        $client->submit($crawler->selectButton('sign_in')->form([
            'emailAddress' => 'superadmin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        self::assertTrue($client->getResponse()->isRedirect('/admin/dashboard'));

        $client->followRedirect();
        self::assertTrue($client->getResponse()->isSuccessful());
    }

    public function testLoginTwoFactor(): void
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/login');
        self::assertTrue($client->getResponse()->isSuccessful());

        $client->submit($crawler->selectButton('sign_in')->form([
            'emailAddress' => 'admin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        self::assertTrue($client->getResponse()->isRedirect('/admin/dashboard'));

        $client->followRedirect();
        self::assertTrue($client->getResponse()->isRedirect($client->getRequest()->getSchemeAndHttpHost().'/admin/2fa'));

        $crawler = $client->followRedirect();
        self::assertTrue($client->getResponse()->isSuccessful());
    }
}
