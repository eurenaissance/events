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
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Register')->form([
            'emailAddress' => 'new@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => 'test123'],
        ]));
        $this->assertIsRedirectedTo('/register/check-email');
        $this->assertMailSent([
            'to' => 'new@mobilisation.eu',
            'subject' => 'Welcome Rémi, please confirm your registration.',
            'body' => "@string@
                        .contains('Welcome Rémi!')
                        .matchRegex('#href=\"http://localhost/register/confirm/".self::UUID_PATTERN."#\"')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('A mail has been sent to confirm your account.');
        $this->assertActorConfirmed('new@mobilisation.eu', false);
    }

    public function provideBadRegistrations(): iterable
    {
        yield [
            'emailAddress' => 'remi@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => 'test123'],
            'errors' => ['This email address is already registered.'],
        ];

        yield [
            'emailAddress' => 'REMI@MOBILISATION.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => 'test123'],
            'errors' => ['This email address is already registered.'],
        ];

        yield [
            'emailAddress' => 'unknown@test',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => 'test123'],
            'errors' => ['This email address is not valid.'],
        ];

        yield [
            'emailAddress' => 'new@mobilisation.eu',
            'firstName' => null,
            'lastName' => null,
            'birthday' => ['year' => null, 'month' => 11, 'day' => 27],
            'password' => ['first' => 'test123', 'second' => '123test'],
            'errors' => [
                'Please enter your first name.',
                'Please enter your last name.',
                'This date is not valid.',
                'Passwords do not match.',
            ],
        ];

        yield [
            'emailAddress' => 'new@mobilisation.eu',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'password' => ['first' => '123', 'second' => '123'],
            'errors' => ['Password must be at least 6 characters long.'],
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
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Register')->form([
            'emailAddress' => $emailAddress,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'birthday' => $birthday,
            'password' => $password,
        ]));
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
    }

    public function testConfirmSuccess(): void
    {
        $this->assertActorConfirmed('marine@mobilisation.eu', false);

        $this->client->request('GET', '/register/confirm/'.ActorConfirmTokenFixtures::TOKEN_04_UUID);
        $this->assertIsRedirectedTo('/login');
        $this->assertMailSent([
            'to' => 'marine@mobilisation.eu',
            'subject' => 'Welcome Marine, your registration is now complete.',
            'body' => "@string@
                        .contains('Welcome Marine!')
                        .contains('Your registration is now complete.')
                        .contains('href=\"http://localhost/login\"')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Your registration is now complete.');
        $this->assertActorConfirmed('marine@mobilisation.eu', true);
    }

    public function provideConfirmationFailures(): iterable
    {
        // token is already consumed
        yield [
            'email' => 'remi@mobilisation.eu',
            'alreadyConfirmed' => true,
            'token' => ActorConfirmTokenFixtures::TOKEN_01_UUID,
            'redirectedTo' => '/login',
            'errors' => ['Your account is already confirmed.'],
        ];

        // token is expired but user is now confirmed
        yield [
            'email' => 'titouan@mobilisation.eu',
            'alreadyConfirmed' => true,
            'token' => ActorConfirmTokenFixtures::TOKEN_02_UUID,
            'redirectedTo' => '/login',
            'errors' => ['Your account is already confirmed.'],
        ];

        // token is expired
        yield [
            'email' => 'nicolas@mobilisation.eu',
            'alreadyConfirmed' => false,
            'token' => ActorConfirmTokenFixtures::TOKEN_05_UUID,
            'redirectedTo' => '/register/resend-confirmation',
            'errors' => ['This link is no longer valid.'],
        ];
    }

    /**
     * @dataProvider provideConfirmationFailures
     */
    public function testConfirmationFailure(
        string $email,
        bool $alreadyConfirmed,
        string $token,
        string $redirectedTo,
        array $errors
    ): void {
        $this->assertActorConfirmed($email, $alreadyConfirmed);

        $this->client->request('GET', "/register/confirm/$token");
        $this->assertIsRedirectedTo($redirectedTo);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
        $this->assertActorConfirmed($email, $alreadyConfirmed);
    }

    private function assertActorConfirmed(string $email, bool $expected): void
    {
        $this->assertSame($expected, $this->getActorRepository()->findOneByEmail($email)->isConfirmed());
    }
}
