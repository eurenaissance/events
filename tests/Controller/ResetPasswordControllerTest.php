<?php

namespace Test\App\Controller;

use App\DataFixtures\ActorResetPasswordTokenFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ResetPasswordControllerTest extends HttpTestCase
{
    public function testRequest(): void
    {
        $crawler = $this->client->request('GET', '/password/request');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Request new password')->form([
            'emailAddress' => 'remi@mobilisation.eu',
        ]));
        $this->assertIsRedirectedTo('/password/request/check-email');
        $this->assertMailSent([
            'to' => 'remi@mobilisation.eu',
            'subject' => 'mail.actor.reset_password.subject',
            'body' => "@string@
                        .contains('Hello Rémi!')
                        .matchRegex('#href=\"http://localhost/password/reset/".self::UUID_PATTERN."#\"')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
    }

    public function testRequestToPendingToken(): void
    {
        $crawler = $this->client->request('GET', '/password/request');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Request new password')->form([
            'emailAddress' => 'titouan@mobilisation.eu',
        ]));
        $this->assertIsRedirectedTo('/login');

        $this->client->followRedirect();
        $this->assertResponseContains('actor.password_request.pending_token_exists');
    }

    public function testReset(): void
    {
        $resetPasswordUrl = sprintf('/password/reset/%s', ActorResetPasswordTokenFixtures::TOKEN_01_UUID);
        $crawler = $this->client->request('GET', $resetPasswordUrl);
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Reset password')->form([
            'password' => [
                'first' => 'test!321',
                'second' => 'test!321',
            ],
        ]));
        $this->assertIsRedirectedTo('/login');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('actor.password_reset.success');

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'titouan@mobilisation.eu',
            'password' => 'test!321',
        ]));
        $this->assertIsRedirectedTo('/');

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Hello Titouan');
    }

    public function provideInvalidTokens(): iterable
    {
        yield [
            'token' => ActorResetPasswordTokenFixtures::TOKEN_02_UUID,
            'error' => 'actor.password_reset.token_expired',
        ];

        yield [
            'token' => ActorResetPasswordTokenFixtures::TOKEN_03_UUID,
            'error' => 'actor.password_reset.token_already_consumed',
        ];
    }

    /**
     * @dataProvider provideInvalidTokens
     */
    public function testInvalidToken(string $token, string $error): void
    {
        $this->client->request('GET', "/password/reset/$token");
        $this->assertIsRedirectedTo('/login');

        $this->client->followRedirect();
        $this->assertResponseContains($error);
    }
}
