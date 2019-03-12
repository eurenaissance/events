<?php

namespace Test\App\Controller\Actor;

use App\DataFixtures\Actor\ResetPasswordTokenFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ResetPasswordControllerTest extends HttpTestCase
{
    public function provideRequestsForLoggedInUser(): iterable
    {
        yield ['GET', '/reset-password'];
        yield ['GET', '/reset-password/check-email'];
        yield ['GET', '/reset-password/'.ResetPasswordTokenFixtures::TOKEN_01_UUID];
        yield ['GET', '/reset-password/'.ResetPasswordTokenFixtures::TOKEN_02_UUID];
        yield ['GET', '/reset-password/'.ResetPasswordTokenFixtures::TOKEN_03_UUID];
    }

    /**
     * @dataProvider provideRequestsForLoggedInUser
     */
    public function testLoggedInUserIsRedirectedToChangePassword(string $method, string $uri, array $parameters = []): void
    {
        $this->authenticateActor('remi@mobilisation-eu.localhost');

        $this->client->request($method, $uri, $parameters);
        $this->assertIsRedirectedTo('/profile/change-password');
    }

    public function provideRequestSuccess(): iterable
    {
        yield ['titouan@mobilisation-eu.localhost', 'Titouan'];
        yield ['marine@mobilisation-eu.localhost', 'Marine'];
        yield ['nicolas@mobilisation-eu.localhost', 'Nicolas'];
    }

    /**
     * @dataProvider provideRequestSuccess
     */
    public function testRequestSuccess(string $email, string $firstName): void
    {
        $this->client->request('GET', '/reset-password');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('password_reset_request.button', ['emailAddress' => $email]);
        $this->assertIsRedirectedTo('/reset-password/check-email');
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'mail.actor.reset_password_request.subject',
            'body' => "@string@.contains('mail.actor.reset_password_request.body')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
    }

    public function testRequestToPendingToken(): void
    {
        $this->client->request('GET', '/reset-password');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('password_reset_request.button', ['emailAddress' => 'remi@mobilisation-eu.localhost']);
        $this->assertIsRedirectedTo('/login');
        $this->assertNoMailSent();

        $this->client->followRedirect();
        $this->assertResponseContains('flashes.reset_password.pending_token');
    }

    public function provideResetSuccess(): iterable
    {
        yield ['test!321'];
        yield ['test!123'];
        yield ['password with spaces'];
        // current password of the user
        yield ['secret!12345'];
    }

    /**
     * @dataProvider provideResetSuccess
     */
    public function testResetSuccess(string $password): void
    {
        $resetPasswordUrl = sprintf('/reset-password/%s', ResetPasswordTokenFixtures::TOKEN_01_UUID);
        $this->client->request('GET', $resetPasswordUrl);
        $this->assertResponseSuccessFul();

        $this->client->submitForm('password_reset_reset.save', [
            'plainPassword' => [
                'first' => $password,
                'second' => $password,
            ],
        ]);
        $this->assertIsRedirectedTo('/login');
        $this->assertMailSent([
            'to' => 'remi@mobilisation-eu.localhost',
            'subject' => 'mail.actor.reset_password_success.subject',
            'body' => "@string@.contains('mail.actor.reset_password_success.body')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('flashes.reset_password.success');

        $this->client->submitForm('login.button', [
            'emailAddress' => 'remi@mobilisation-eu.localhost',
            'password' => $password,
        ]);
        $this->assertIsRedirectedTo('/');

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $this->assertResponseContains('Rémi Gardien');
    }

    public function provideBadPasswordChanges(): iterable
    {
        yield [
            'first' => 'test',
            'second' => 'test',
            'error' => 'common.password.min_length',
        ];

        yield [
            'first' => 'test123',
            'second' => '123test',
            'error' => 'common.password.mismatch',
        ];

        yield [
            'first' => '',
            'second' => '',
            'error' => 'common.password.not_blank',
        ];

        yield [
            'first' => null,
            'second' => null,
            'error' => 'common.password.not_blank',
        ];
    }

    /**
     * @dataProvider provideBadPasswordChanges
     */
    public function testResetFailure(?string $first, ?string $second, string $error): void
    {
        $actorRepository = $this->getActorRepository();
        $initialPassword = $actorRepository->findOneByEmail('remi@mobilisation-eu.localhost')->getPassword();

        $resetPasswordUrl = sprintf('/reset-password/%s', ResetPasswordTokenFixtures::TOKEN_01_UUID);
        $this->client->request('GET', $resetPasswordUrl);
        $this->assertResponseSuccessFul();

        $this->client->submitForm('password_reset_reset.save', [
            'plainPassword' => [
                'first' => $first,
                'second' => $second,
            ],
        ]);
        $this->assertResponseSuccessFul('Actor should not be redirected if reset form is not valid.');
        $this->assertResponseContains($error);

        $actorRepository->clear();
        $finalPassword = $actorRepository->findOneByEmail('remi@mobilisation-eu.localhost')->getPassword();
        $this->assertSame($initialPassword, $finalPassword);
    }

    public function provideInvalidTokens(): iterable
    {
        // consumed token
        yield [
            'token' => ResetPasswordTokenFixtures::TOKEN_02_UUID,
            'error' => 'flashes.reset_password.token_expired',
        ];

        // expired token
        yield [
            'token' => ResetPasswordTokenFixtures::TOKEN_03_UUID,
            'error' => 'flashes.reset_password.token_expired',
        ];
    }

    /**
     * @dataProvider provideInvalidTokens
     */
    public function testInvalidToken(string $token, string $error): void
    {
        $this->client->request('GET', "/reset-password/$token");
        $this->assertIsRedirectedTo('/login');

        $this->client->followRedirect();
        $this->assertResponseContains($error);
    }
}
