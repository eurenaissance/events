<?php

namespace Test\App\Controller;

use App\DataFixtures\ActorFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class SecurityControllerTest extends HttpTestCase
{
    public function provideLoginFailures(): iterable
    {
        yield [
            'email' => 'unknown@mobilisation.eu',
            'password' => ActorFixtures::DEFAULT_PASSWORD,
            'errors' => ['security.actor.bad_credentials'],
        ];

        yield [
            'email' => 'remi@mobilisation.eu',
            'password' => 'bad_password',
            'errors' => ['security.actor.bad_credentials'],
        ];

        yield [
            'email' => 'marine@mobilisation.eu',
            'password' => ActorFixtures::DEFAULT_PASSWORD,
            'errors' => [
                'Your account is not confirmed yet.',
                '/register/resend-confirmation',
            ],
        ];
    }

    /**
     * @dataProvider provideLoginFailures
     */
    public function testLoginFailure(string $email, string $password, array $errors): void
    {
        $crawler = $this->client->request('GET', '/login');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => $email,
            'password' => $password,
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/login'));

        $crawler = $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertEquals($email, $crawler->selectButton('Sign in')->form()->get('emailAddress')->getValue());

        foreach ($errors as $error) {
            self::assertContains($error, $crawler->filter('.login_error')->html());
        }
    }

    public function testLogin(): void
    {
        $crawler = $this->client->request('GET', '/login');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'remi@mobilisation.eu',
            'password' => ActorFixtures::DEFAULT_PASSWORD,
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/'));

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertContains('Hello Rémi!', $this->client->getResponse()->getContent());
    }
}
