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
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Request new password')->form([
            'emailAddress' => 'remi@mobilisation.eu',
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/password/request/check-email'));

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
    }

    public function testReset(): void
    {
        $resetPasswordUrl = sprintf('/password/reset/%s', ActorResetPasswordTokenFixtures::TOKEN_01_UUID);
        $crawler = $this->client->request('GET', $resetPasswordUrl);
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Reset password')->form([
            'password' => [
                'first' => 'test!321',
                'second' => 'test!321',
            ],
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/login'));

        $crawler = $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertContains('actor.password_reset.password_changed', $this->client->getResponse()->getContent());

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'titouan@mobilisation.eu',
            'password' => 'test!321',
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/'));

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertContains('Hello Titouan', $this->client->getResponse()->getContent());
    }

    public function testExpiredToken(): void
    {
        $resetPasswordUrl = sprintf('/password/reset/%s', ActorResetPasswordTokenFixtures::TOKEN_02_UUID);
        $this->client->request('GET', $resetPasswordUrl);
        self::assertTrue($this->client->getResponse()->isRedirect('/login'));

        $this->client->followRedirect();
        self::assertContains('actor.password_reset.token_expired', $this->client->getResponse()->getContent());
    }

    public function testAlreadyConsumedToken(): void
    {
        $resetPasswordUrl = sprintf('/password/reset/%s', ActorResetPasswordTokenFixtures::TOKEN_03_UUID);
        $this->client->request('GET', $resetPasswordUrl);
        self::assertTrue($this->client->getResponse()->isRedirect('/login'));

        $this->client->followRedirect();
        self::assertContains('actor.password_reset.token_already_consumed', $this->client->getResponse()->getContent());
    }
}
