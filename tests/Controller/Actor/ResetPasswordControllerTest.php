<?php

namespace Test\App\Controller\Actor;

use App\DataFixtures\ActorResetPasswordTokenFixtures;
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
        yield ['GET', '/reset-password/'.ActorResetPasswordTokenFixtures::TOKEN_01_UUID];
        yield ['GET', '/reset-password/'.ActorResetPasswordTokenFixtures::TOKEN_02_UUID];
        yield ['GET', '/reset-password/'.ActorResetPasswordTokenFixtures::TOKEN_03_UUID];
    }

    /**
     * @dataProvider provideRequestsForLoggedInUser
     */
    public function testLoggedInUserIsRedirectedToChangePassword(string $method, string $uri, array $parameters = []): void
    {
        $this->authenticateActor('remi@mobilisation.eu');

        $this->client->request($method, $uri, $parameters);
        $this->assertIsRedirectedTo('/profile/change-password');
    }

    public function testRequestSuccess(): void
    {
        $crawler = $this->client->request('GET', '/reset-password');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Request new password')->form([
            'emailAddress' => 'remi@mobilisation.eu',
        ]));
        $this->assertIsRedirectedTo('/reset-password/check-email');
        $this->assertMailSent([
            'to' => 'remi@mobilisation.eu',
            'subject' => 'A password reset has been requested.',
            'body' => "@string@
                        .contains('Hello Rémi!')
                        .matchRegex('#href=\"http://localhost/reset-password/".self::UUID_PATTERN."#\"')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
    }

    public function testRequestToPendingToken(): void
    {
        $crawler = $this->client->request('GET', '/reset-password');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Request new password')->form([
            'emailAddress' => 'titouan@mobilisation.eu',
        ]));
        $this->assertIsRedirectedTo('/login');
        $this->assertNoMailSent();

        $this->client->followRedirect();
        $this->assertResponseContains('A mail has already been sent in the last 2 hours');
    }

    public function testResetSuccess(): void
    {
        $resetPasswordUrl = sprintf('/reset-password/%s', ActorResetPasswordTokenFixtures::TOKEN_01_UUID);
        $crawler = $this->client->request('GET', $resetPasswordUrl);
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Reset password')->form([
            'password' => [
                'first' => 'test!321',
                'second' => 'test!321',
            ],
        ]));
        $this->assertIsRedirectedTo('/login');
        $this->assertMailSent([
            'to' => 'titouan@mobilisation.eu',
            'subject' => 'Your password has been successfully reset.',
            'body' => "@string@
                        .contains('Hello Titouan!')
                        .contains('Your password has been successfully reset.')",
        ]);

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Your password has been successfully reset.');

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'titouan@mobilisation.eu',
            'password' => 'test!321',
        ]));
        $this->assertIsRedirectedTo('/');

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Hello Titouan!');
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
    }

    /**
     * @dataProvider provideBadPasswordChanges
     */
    public function testResetFailure(string $first, string $second, string $error): void
    {
        $initialPassword = $this->getActorRepository()->findOneByEmail('remi@mobilisation.eu')->getPassword();

        $resetPasswordUrl = sprintf('/reset-password/%s', ActorResetPasswordTokenFixtures::TOKEN_01_UUID);
        $crawler = $this->client->request('GET', $resetPasswordUrl);
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Reset password')->form([
            'password' => ['first' => $first, 'second' => $second],
        ]));
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($error);

        $finalPassword = $this->getActorRepository()->findOneByEmail('remi@mobilisation.eu')->getPassword();
        $this->assertSame($initialPassword, $finalPassword);
    }

    public function provideInvalidTokens(): iterable
    {
        // consumed token
        yield [
            'token' => ActorResetPasswordTokenFixtures::TOKEN_02_UUID,
            'error' => 'This link is no longer valid.',
        ];

        // expired token
        yield [
            'token' => ActorResetPasswordTokenFixtures::TOKEN_03_UUID,
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
