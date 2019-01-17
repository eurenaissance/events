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
        self::assertTrue($this->client->getResponse()->isRedirect('/admin/setup'));

        $crawler = $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Save')->form([
            'emailAddress' => 'first_admin@mobilisation-eu.code',
            'password' => [
                'first' => AdministratorFixtures::DEFAULT_PASSWORD,
                'second' => AdministratorFixtures::DEFAULT_PASSWORD,
            ],
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/admin/login'));

        $crawler = $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertEquals(1, $administratorRepository->countAdministrators());

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'first_admin@mobilisation-eu.code',
            'password' => AdministratorFixtures::DEFAULT_PASSWORD,
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/admin/dashboard'));

        $crawler = $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertGreaterThan(0, $crawler->filter('a:contains("Administrators")')->count());
    }

    public function testSetupIsDisabled(): void
    {
        $this->client->request('GET', '/admin/login');
        self::assertTrue($this->client->getResponse()->isSuccessful());
    }
}
