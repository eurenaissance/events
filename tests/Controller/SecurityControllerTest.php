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
            'errors' => ['Invalid credentials'],
        ];

        yield [
            'email' => 'remi@mobilisation.eu',
            'password' => 'bad_password',
            'errors' => ['Invalid credentials'],
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
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => $email,
            'password' => $password,
        ]));
        $this->assertIsRedirectedTo('/login');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertEquals($email, $crawler->selectButton('Sign in')->form()->get('emailAddress')->getValue());

        foreach ($errors as $error) {
            $this->assertContains($error, $crawler->filter('.login_error')->html());
        }
    }

    public function testLogin(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => 'remi@mobilisation.eu',
            'password' => ActorFixtures::DEFAULT_PASSWORD,
        ]));
        $this->assertIsRedirectedTo('/');

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Hello Rémi!');
    }
}
