<?php

namespace Test\App\Controller;

use App\DataFixtures\ActorConfirmTokenFixtures;
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
        self::assertTrue($this->client->getResponse()->isRedirect('/register/check-email'));
        $this->assertMailSent([
            'to' => 'new@mobilisation.eu',
            'subject' => 'mail.actor.registration.subject',
            'body' => "@string@
                        .contains('Welcome Rémi!')
                        .contains('http://localhost/register/confirm')",
        ]);

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertActorConfirmed('new@mobilisation.eu', false);
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

    public function testResendConfirmation(): void
    {
        $crawler = $this->client->request('GET', '/register/resend-confirmation');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Resend confirmation')->form([
            'emailAddress' => 'marine@mobilisation.eu',
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/register/resend-confirmation/check-email'));
        $this->assertMailSent([
            'to' => 'marine@mobilisation.eu',
            'subject' => 'mail.actor.registration.subject',
            'body' => "@string@
                        .contains('Welcome Marine!')
                        .matchRegex('#href=\"http://localhost/register/confirm/".self::UUID_PATTERN."#\"')",
        ]);

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
    }

    public function testResendConfirmationToUnknown(): void
    {
        $crawler = $this->client->request('GET', '/register/resend-confirmation');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Resend confirmation')->form([
            'emailAddress' => 'unknown@mobilisation.eu',
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/register/resend-confirmation/check-email'));
        $this->assertNoMailSent();

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
    }

    public function testResendConfirmationToAlreadyConfirmed(): void
    {
        self::assertActorConfirmed('remi@mobilisation.eu', true);

        $crawler = $this->client->request('GET', '/register/resend-confirmation');
        self::assertTrue($this->client->getResponse()->isSuccessful());

        $this->client->submit($crawler->selectButton('Resend confirmation')->form([
            'emailAddress' => 'remi@mobilisation.eu',
        ]));
        self::assertTrue($this->client->getResponse()->isRedirect('/login'));
        $this->assertNoMailSent();

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertContains('actor.registration.already_confirmed', $this->client->getResponse()->getContent());
    }

    public function testConfirmSuccess(): void
    {
        self::assertActorConfirmed('marine@mobilisation.eu', false);

        $this->client->request('GET', '/register/confirm/'.ActorConfirmTokenFixtures::TOKEN_03_UUID);
        self::assertTrue($this->client->getResponse()->isRedirect('/login'));

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertContains('actor.registration.confirmed', $this->client->getResponse()->getContent());
        self::assertActorConfirmed('marine@mobilisation.eu', true);
    }

    public function testConfirmFailure(): void
    {
        self::assertActorConfirmed('titouan@mobilisation.eu', true);

        $this->client->request('GET', '/register/confirm/'.ActorConfirmTokenFixtures::TOKEN_02_UUID);
        self::assertTrue($this->client->getResponse()->isRedirect('/login'));

        $this->client->followRedirect();
        self::assertTrue($this->client->getResponse()->isSuccessful());
        self::assertContains('actor.registration.already_confirmed', $this->client->getResponse()->getContent());
        self::assertActorConfirmed('titouan@mobilisation.eu', true);
    }

    private static function assertActorConfirmed(string $email, bool $expected): void
    {
        self::assertSame($expected, self::getActorRepository()->findOneByEmail($email)->isConfirmed());
    }
}
