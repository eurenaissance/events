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
            ['Invalid credentials'],
        ];

        yield [
            [
                'emailAddress' => 'remi@mobilisation-eu.localhost',
                'password' => 'bad_password',
            ],
            ['Invalid credentials'],
        ];

        yield [
            [
                'emailAddress' => 'patrick@mobilisation-eu.localhost',
                'password' => ActorFixtures::DEFAULT_PASSWORD,
            ],
            [
                'Your account is not confirmed yet.',
                '/register/resend-confirmation',
            ],
        ];

        yield [
            [
                'emailAddress' => 'leonard@mobilisation-eu.localhost',
                'password' => ActorFixtures::DEFAULT_PASSWORD,
            ],
            [
                'Your account is not confirmed yet.',
                '/register/resend-confirmation',
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

        $this->client->submitForm('Log in', $fieldValues);
        $this->assertIsRedirectedTo('/login');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $form = $crawler->selectButton('Log in')->form();
        $this->assertEquals($fieldValues['emailAddress'], $form->get('emailAddress')->getValue());

        foreach ($errors as $error) {
            $this->assertContains($error, $crawler->filter('.alert-danger')->html());
        }
    }

    public function testLogin(): void
    {
        $this->client->request('GET', '/login');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Log in', [
            'emailAddress' => 'remi@mobilisation-eu.localhost',
            'password' => ActorFixtures::DEFAULT_PASSWORD,
        ]);
        $this->assertIsRedirectedTo('/');

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Rémi Gardien');
    }
}
