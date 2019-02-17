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
            [
                'emailAddress' => 'unknown@mobilisation-eu.localhost',
                'password' => ActorFixtures::DEFAULT_PASSWORD,
            ],
            [
                'security.login.error.bad_credentials',
            ],
        ];

        yield [
            [
                'emailAddress' => 'remi@mobilisation-eu.localhost',
                'password' => 'bad_password',
            ],
            [
                'security.login.error.bad_credentials',
            ],
        ];

        yield [
            [
                'emailAddress' => 'patrick@mobilisation-eu.localhost',
                'password' => ActorFixtures::DEFAULT_PASSWORD,
            ],
            [
                'security.login.error.not_confirmed',
            ],
        ];

        yield [
            [
                'emailAddress' => 'leonard@mobilisation-eu.localhost',
                'password' => ActorFixtures::DEFAULT_PASSWORD,
            ],
            [
                'security.login.error.not_confirmed',
            ],
        ];
    }

    /**
     * @dataProvider provideLoginFailures
     */
    public function testLoginFailure(array $fieldValues, array $errors): void
    {
        $this->client->request('GET', '/login');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('login.button', $fieldValues);
        $this->assertIsRedirectedTo('/login');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $form = $crawler->selectButton('login.button')->form();
        $this->assertEquals($fieldValues['emailAddress'], $form->get('emailAddress')->getValue());

        foreach ($errors as $error) {
            $this->assertContains($error, $crawler->filter('.alert-danger')->html());
        }
    }

    public function testLogin(): void
    {
        $this->client->request('GET', '/login');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('login.button', [
            'emailAddress' => 'remi@mobilisation-eu.localhost',
            'password' => ActorFixtures::DEFAULT_PASSWORD,
        ]);
        $this->assertIsRedirectedTo('/');

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Rémi Gardien');
    }
}
