<?php

namespace Test\App\Controller\Admin;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class AdministratorControllerTest extends HttpTestCase
{
    public function provideAdministratorAdminRequests(): iterable
    {
        yield ['/admin/app/administrator/list'];
        yield ['/admin/app/administrator/create'];
    }

    /**
     * @dataProvider provideAdministratorAdminRequests
     */
    public function testSimpleAdminCannotSeeAdministratorAdmin(string $uri): void
    {
        $this->authenticateAdmin('admin@mobilisation-eu.localhost');

        $this->client->request('GET', $uri);
        $this->assertAccessDeniedResponse();
    }

    /**
     * @dataProvider provideAdministratorAdminRequests
     */
    public function testSuperAdminCanSeeAdministratorAdmin(string $uri): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', $uri);
        $this->assertResponseSuccessful();
    }

    public function provideAdministratorEditions(): iterable
    {
        // provide google authenticator secret
        yield [
            1,
            'superadmin@mobilisation-eu.localhost',
            [
                'googleAuthenticatorSecret' => '',
                'roles' => [0 => 'ROLE_SUPER_ADMIN'],
            ],
            [
                'googleAuthenticatorSecret' => '53YNXH6LFUOBT7LC',
                'roles' => [0 => 'ROLE_SUPER_ADMIN'],
            ],
        ];

        // promote to super admin
        yield [
            2,
            'admin@mobilisation-eu.localhost',
            [
                'googleAuthenticatorSecret' => '53YNXH6LFUOBT7LC',
                'roles' => [1 => 'ROLE_ADMIN'],
            ],
            [
                'googleAuthenticatorSecret' => 'FUOBT7LC53YNXH6L',
                'roles' => [0 => 'ROLE_SUPER_ADMIN'],
            ],
        ];

        // remove all roles
        yield [
            2,
            'admin@mobilisation-eu.localhost',
            [
                'googleAuthenticatorSecret' => '53YNXH6LFUOBT7LC',
                'roles' => [1 => 'ROLE_ADMIN'],
            ],
            [
                'googleAuthenticatorSecret' => null,
                'roles' => [],
            ],
        ];
    }

    /**
     * @dataProvider provideAdministratorEditions
     */
    public function testEditSuccess(int $id, string $email, array $actualProfile, array $editedProfile): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $crawler = $this->client->request('GET', "/admin/app/administrator/$id/edit");
        $this->assertResponseSuccessful();

        $form = $crawler->selectButton('Update')->form();
        $uniqId = $this->getAdminFormUniqId($form);
        $this->assertTrue($form->get($uniqId.'[emailAddress]')->isDisabled());
        $this->assertSame($email, $form->get($uniqId.'[emailAddress]')->getValue());
        $this->assertArraySubset($actualProfile, $form->getPhpValues()[$uniqId]);

        $this->client->submit($form, [$uniqId => $editedProfile]);
        $this->assertIsRedirectedTo("/admin/app/administrator/$id/edit");

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertResponseContains("Item \"$email\" has been successfully updated.");

        $form = $crawler->selectButton('Update')->form();
        $this->assertTrue($form->get($uniqId.'[emailAddress]')->isDisabled());
        $this->assertSame($email, $form->get($uniqId.'[emailAddress]')->getValue());
        $this->assertArraySubset($editedProfile, $form->getPhpValues()[$uniqId]);
    }

    public function testEditPasswordSuccess(): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/app/administrator/2/edit');
        $this->assertResponseSuccessful();

        $this->submitAdminForm('Update', [
            'plainPassword' => [
                'first' => 'new_pass_123',
                'second' => 'new_pass_123',
            ],
            'googleAuthenticatorSecret' => '',
        ]);
        $this->assertIsRedirectedTo('/admin/app/administrator/2/edit');

        $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertResponseContains('Item "admin@mobilisation-eu.localhost" has been successfully updated.');

        $this->client->request('GET', '/admin/logout');
        $this->assertIsRedirectedTo($this->getAbsoluteUrl('/admin/login'));

        $this->client->followRedirect();
        $this->assertResponseSuccessful();

        $this->client->submitForm('Sign in', [
            'emailAddress' => 'admin@mobilisation-eu.localhost',
            'password' => 'new_pass_123',
        ]);
        $this->assertIsRedirectedTo('/admin/dashboard');

        $this->client->followRedirect();
        $this->assertResponseSuccessful();
    }

    public function provideEditPasswordFailures(): iterable
    {
        yield ['test123', null, 'The password and its confirmation do not match.'];
        yield [null, 'test123', 'The password and its confirmation do not match.'];
        yield ['test123', '321test', 'The password and its confirmation do not match.'];
        yield ['123', '123', 'The password must contain at least 6 characters.'];
    }

    /**
     * @dataProvider provideEditPasswordFailures
     */
    public function testEditPasswordFailure(?string $firstPassword, ?string $secondPassword, string $error): void
    {
        $this->authenticateAdmin('superadmin@mobilisation-eu.localhost');

        $this->client->request('GET', '/admin/app/administrator/2/edit');
        $this->assertResponseSuccessful();

        $this->submitAdminForm('Update', [
            'plainPassword' => [
                'first' => $firstPassword,
                'second' => $secondPassword,
            ],
        ]);
        $this->assertResponseSuccessful();
        $this->assertResponseContains([
            'An error has occurred during update of item "admin@mobilisation-eu.localhost".',
            $error,
        ]);
    }
}
