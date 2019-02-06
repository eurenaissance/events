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

        $this->client->submitForm('Submit', ['emailAddress' => $email]);
        $this->assertIsRedirectedTo('/reset-password/check-email');
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'A password reset has been requested.',
            'body' => "@string@
                        .contains('Hello $firstName!')
                        .matchRegex('#href=\"http://localhost/reset-password/".self::UUID_PATTERN."#\"')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
    }

    public function testRequestToPendingToken(): void
    {
        $this->client->request('GET', '/reset-password');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Submit', ['emailAddress' => 'remi@mobilisation-eu.localhost']);
        $this->assertIsRedirectedTo('/login');
        $this->assertNoMailSent();

        $this->client->followRedirect();
        $this->assertResponseContains('A mail has already been sent in the last 2 hours');
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

        $this->client->submitForm('Reset password', [
            'plainPassword' => [
                'first' => $password,
                'second' => $password,
            ],
        ]);
        $this->assertIsRedirectedTo('/login');
        $this->assertMailSent([
            'to' => 'remi@mobilisation-eu.localhost',
            'subject' => 'Your password has been successfully reset.',
            'body' => "@string@
                        .contains('Hello Rémi!')
                        .contains('Your password has been successfully reset.')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Your password has been successfully reset.');

        $this->client->submitForm('Log in', [
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
            'error' => 'Password must be at least 6 characters long.',
        ];

        yield [
            'first' => 'test123',
            'second' => '123test',
            'error' => 'Passwords do not match.',
        ];

        yield [
            'first' => '',
            'second' => '',
            'error' => 'Please enter a password',
        ];

        yield [
            'first' => null,
            'second' => null,
            'error' => 'Please enter a password',
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

        $this->client->submitForm('Reset password', [
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
            'error' => 'This link is no longer valid.',
        ];

        // expired token
        yield [
            'token' => ResetPasswordTokenFixtures::TOKEN_03_UUID,
            'error' => 'This link is no longer valid.',
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
