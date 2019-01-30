<?php

namespace Test\App\Controller\Admin;

use App\Repository\AdministratorRepository;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class AdministratorSetupControllerTest extends HttpTestCase
{
    public function provideSetupSuccess(): iterable
    {
        yield ['first_admin@mobilisation-eu.localhost', 'test123'];
        yield ['superadmin@mobilisation-eu.localhost', 'secret!123'];
        yield ['remi@mobilisation-eu.localhost', '654test'];
    }

    /**
     * @dataProvider provideSetupSuccess
     */
    public function testSetupSuccess(string $email, string $password): void
    {
        /** @var AdministratorRepository $administratorRepository */
        $administratorRepository = $this->get(AdministratorRepository::class);

        $administratorRepository->deleteAll();
        $this->assertFalse($administratorRepository->hasAdministrator());

        $this->client->request('GET', '/admin/login');
        $this->assertIsRedirectedTo('/admin/setup');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Save')->form(), [
            'emailAddress' => $email,
            'plainPassword' => [
                'first' => $password,
                'second' => $password,
            ],
        ]);
        $this->assertIsRedirectedTo('/admin/login');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertTrue($administratorRepository->hasAdministrator());

        $this->client->submit($crawler->selectButton('Sign in')->form(), [
            'emailAddress' => $email,
            'password' => $password,
        ]);
        $this->assertIsRedirectedTo('/admin/dashboard');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertGreaterThan(0, $crawler->filter('a:contains("Administrators")')->count());
    }

    public function provideSetupFailure(): iterable
    {
        yield ['superadmin@mobilisation-eu', 'test123', 'test123', ['This value is not a valid email address.']];
        yield ['', 'test123', 'test123', ['This value should not be blank.']];
        yield [null, 'test123', 'test123', ['This value should not be blank.']];
        yield ['superadmin@mobilisation-eu.localhost', 'test123', '321test', ['Passwords do not match.']];
        yield ['superadmin@mobilisation-eu.localhost', 'test', 'test', ['Password must be at least 6 characters long.']];
        yield ['superadmin@mobilisation-eu.localhost', '', '', ['Please enter a password.']];
        yield ['superadmin@mobilisation-eu.localhost', null, null, ['Please enter a password.']];
    }

    /**
     * @dataProvider provideSetupFailure
     */
    public function testSetupFailure(?string $email, ?string $firstPassword, ?string $secondPassword, array $errors): void
    {
        /** @var AdministratorRepository $administratorRepository */
        $administratorRepository = $this->get(AdministratorRepository::class);

        $administratorRepository->deleteAll();
        $this->assertFalse($administratorRepository->hasAdministrator());

        $crawler = $this->client->request('GET', '/admin/setup');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Save')->form(), [
            'emailAddress' => $email,
            'plainPassword' => [
                'first' => $firstPassword,
                'second' => $secondPassword,
            ],
        ]);
        $this->assertResponseSuccessFul('User should not be redirected in order to see setup form errors.');
        $this->assertResponseContains($errors);
    }

    public function testSetupIsDisabledForAnonymous(): void
    {
        $this->client->request('GET', '/admin/setup');
        $this->assertIsRedirectedTo('/admin/login');
    }

    public function testSetupIsDisabledForActors(): void
    {
        $this->authenticateActor('remi@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/setup');
        $this->assertAccessDeniedResponse();
    }

    public function testSetupIsDisabledForAdministrators(): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/setup');
        $this->assertAccessDeniedResponse();
    }
}
