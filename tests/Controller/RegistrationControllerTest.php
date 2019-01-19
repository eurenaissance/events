<?php

namespace Test\App\Controller;

use App\Repository\ActorRepository;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class RegistrationControllerTest extends HttpTestCase
{
    public function testRegister(): void
    {
        $crawler = $this->client->request('GET', '/register');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Register')->form([
            'emailAddress' => 'new@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => 'test123'],
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/register/success'));
        $this->assertMailSent([
            'to' => 'new@mobilisation.eu',
            'subject' => 'actor.registration.subject',
            'body' => "@string@
                        .contains('Hello Rémi!')
                        .contains('http://localhost/register/confirm')",
        ]);

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertNotNull($this->get(ActorRepository::class)->findOneBy(['emailAddress' => 'remi@mobilisation.eu']));
    }

    public function provideBadRegistrations(): iterable
    {
        yield [
            'emailAddress' => 'remi@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => 'test123'],
            'errors' => ['common.email_address.unique'],
        ];

        yield [
            'emailAddress' => 'unknown@test',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => 'test123'],
            'errors' => ['common.email_address.valid'],
        ];

        yield [
            'emailAddress' => 'new@mobilisation.eu',
            'firstName' => null,
            'lastName' => null,
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => 'test123'],
            'errors' => [
                'common.first_name.not_blank',
                'common.last_name.not_blank',
            ],
        ];

        yield [
            'emailAddress' => 'new@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => null, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => '321test'],
            'errors' => ['common.date.invalid'],
        ];

        yield [
            'emailAddress' => 'new@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => '321test'],
            'errors' => ['common.password.mismatch'],
        ];

        yield [
            'emailAddress' => 'new@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => '123', 'second' => '123'],
            'errors' => ['common.password.min_length'],
        ];
    }

    /**
     * @dataProvider provideBadRegistrations
     */
    public function testRegisterFailure(
        ?string $emailAddress,
        ?string $firstName,
        ?string $lastName,
        array $birthday,
        array $password,
        array $errors
    ): void {
        $crawler = $this->client->request('GET', '/register');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Register')->form([
            'emailAddress' => $emailAddress,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'birthday' => $birthday,
            'password' => $password,
        ]));
        self::assertTrue($this->client->getResponse()->isSuccessful());

        foreach ($errors as $error) {
            self::assertContains($error, $this->client->getResponse()->getContent());
        }
    }
}
