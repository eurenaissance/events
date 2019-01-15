<?php

namespace Test\App\Controller\Admin;

use App\DataFixtures\AdministratorFixtures;
use App\Repository\AdministratorRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group functional
 */
class AdministratorSetupControllerTest extends WebTestCase
{
    public function testSetup(): void
    {
        $client = static::createClient();

        /** @var AdministratorRepository $administratorRepository */
        $administratorRepository = self::$container->get(AdministratorRepository::class);

        $administratorRepository->deleteAll();
        self::assertEquals(0, $administratorRepository->countAdministrators());

        $client->request('GET', '/admin/login');
        self::assertTrue($client->getResponse()->isRedirect('/admin/setup'));

        $crawler = $client->followRedirect();
        self::assertTrue($client->getResponse()->isSuccessful());

        $client->submit($crawler->selectButton('Save')->form([
            'emailAddress' => 'first_admin@mobilisation-eu.code',
            'password' => [
                'first' => AdministratorFixtures::DEFAULT_PASSWORD,
                'second' => AdministratorFixtures::DEFAULT_PASSWORD,
            ],
        ]));
        self::assertTrue($client->getResponse()->isRedirect('/admin/login'));

        $crawler = $client->followRedirect();
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertEquals(1, $administratorRepository->countAdministrators());

        $client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'first_admin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        self::assertTrue($client->getResponse()->isRedirect('/admin/dashboard'));

        $crawler = $client->followRedirect();
        self::assertTrue($client->getResponse()->isSuccessful());
        self::assertGreaterThan(0, $crawler->filter('a:contains("Administrators")')->count());
    }

    public function testSetupIsDisabled(): void
    {
        $client = static::createClient();

        $client->request('GET', '/admin/login');
        self::assertTrue($client->getResponse()->isSuccessful());
    }
}
