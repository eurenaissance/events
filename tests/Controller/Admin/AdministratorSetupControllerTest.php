<?php

namespace Test\App\Controller\Admin;

use App\DataFixtures\AdministratorFixtures;
use App\Repository\AdministratorRepository;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class AdministratorSetupControllerTest extends HttpTestCase
{
    public function testSetup(): void
    {
        /** @var AdministratorRepository $administratorRepository */
        $administratorRepository = $this->get(AdministratorRepository::class);

        $administratorRepository->deleteAll();
        self::assertEquals(0, $administratorRepository->countAdministrators());

        $this->client->request('GET', '/admin/login');
        $this->assertIsRedirectedTo('/admin/setup');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Save')->form([
            'emailAddress' => 'first_admin@mobilisation-eu.code',
            'password' => [
                'first' => AdministratorFixtures::DEFAULT_PASSWORD,
                'second' => AdministratorFixtures::DEFAULT_PASSWORD,
            ],
        ]));
        $this->assertIsRedirectedTo('/admin/login');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        self::assertEquals(1, $administratorRepository->countAdministrators());

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'first_admin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        $this->assertIsRedirectedTo('/admin/dashboard');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        self::assertGreaterThan(0, $crawler->filter('a:contains("Administrators")')->count());
    }

    public function testSetupIsDisabled(): void
    {
        $this->client->request('GET', '/admin/login');
        $this->assertResponseSuccessFul();
    }
}
