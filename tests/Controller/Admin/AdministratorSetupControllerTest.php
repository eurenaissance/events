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

        $this->client->followRedirect();
        $this->assertResponseSuccessful();

        $this->client->submitForm('setup.form.button', [
            'emailAddress' => $email,
            'plainPassword' => [
                'first' => $password,
                'second' => $password,
            ],
        ]);
        $this->assertIsRedirectedTo('/admin/login?from_setup=1');

        $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertTrue($administratorRepository->hasAdministrator());

        $this->client->submitForm('Sign in', [
            'emailAddress' => $email,
            'password' => $password,
        ]);
        $this->assertIsRedirectedTo('/admin/dashboard');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertGreaterThan(0, $crawler->filter('a:contains("Administrators")')->count());
    }

    public function provideSetupFailure(): iterable
    {
        yield ['superadmin@mobilisation-eu', 'test123', 'test123', ['administrator.email_address.invalid']];
        yield ['', 'test123', 'test123', ['administrator.email_address.not_blank']];
        yield [null, 'test123', 'test123', ['administrator.email_address.not_blank']];
        yield ['superadmin@mobilisation-eu.localhost', 'test123', '321test', ['common.password.mismatch']];
        yield ['superadmin@mobilisation-eu.localhost', 'test', 'test', ['common.password.min_length']];
        yield ['superadmin@mobilisation-eu.localhost', '', '', ['common.password.not_blank']];
        yield ['superadmin@mobilisation-eu.localhost', null, null, ['common.password.not_blank']];
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

        $this->client->request('GET', '/admin/setup');
        $this->assertResponseSuccessful();

        $this->client->submitForm('setup.form.button', [
            'emailAddress' => $email,
            'plainPassword' => [
                'first' => $firstPassword,
                'second' => $secondPassword,
            ],
        ]);
        $this->assertResponseSuccessful('User should not be redirected in order to see setup form errors.');
        $this->assertResponseContains($errors);
    }

    public function testSetupIsDisabledForAnonymous(): void
    {
        $this->client->request('GET', '/admin/setup');
        $this->assertIsRedirectedTo('/admin/login?from_setup=1');
    }

    public function testSetupIsDisabledForActors(): void
    {
        $this->authenticateActor('remi@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/setup');
        $this->assertIsRedirectedTo('/admin/login?from_setup=1');
    }

    public function testSetupIsDisabledForAdministrators(): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/setup');
        $this->assertIsRedirectedTo('/admin/login?from_setup=1');
    }
}
