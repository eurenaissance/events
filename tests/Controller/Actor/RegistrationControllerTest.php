<?php

namespace Test\App\Controller\Actor;

use App\DataFixtures\Actor\ConfirmTokenFixtures;
use App\DataFixtures\CityFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class RegistrationControllerTest extends HttpTestCase
{
    public function provideRequestsForLoggedInUser(): iterable
    {
        yield ['GET', '/register'];
        yield ['POST', '/register', [
            'emailAddress' => 'new@mobilisation-eu.localhost',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'plainPassword' => ['first' => 'test123', 'second' => 'test123'],
            'address' => '3 random street',
            'country' => 'FR',
            'zipCode' => '92270',
            'city' => CityFixtures::CITY_02_UUID,
        ]];
        yield ['GET', '/register/check-email'];
        yield ['GET', '/register/resend-confirmation'];
        yield ['GET', '/register/resend-confirmation/check-email'];
        yield ['GET', '/register/confirm/'.ConfirmTokenFixtures::TOKEN_04_UUID];
    }

    /**
     * @dataProvider provideRequestsForLoggedInUser
     */
    public function testLoggedInUserCannotRegister(string $method, string $uri, array $parameters = []): void
    {
        $this->authenticateActor('remi@mobilisation-eu.localhost');

        $this->client->request($method, $uri, $parameters);
        $this->assertAccessDeniedResponse();
    }

    public function testRegisterSuccess(): void
    {
        $this->client->request('GET', '/register');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Register', [
            'emailAddress' => 'new@mobilisation-eu.localhost',
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'plainPassword' => ['first' => 'test123', 'second' => 'test123'],
            'address' => null,
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertIsRedirectedTo('/register/check-email');
        $this->assertMailSent([
            'to' => 'new@mobilisation-eu.localhost',
            'subject' => 'Welcome Rémi, please confirm your registration.',
            'body' => "@string@
                        .contains('Welcome Rémi!')
                        .matchRegex('#href=\"http://localhost/register/confirm/".self::UUID_PATTERN."#\"')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('We sent you an e-mail with a link to confirm your account.');
        $this->assertActorConfirmed('new@mobilisation-eu.localhost', false);
    }

    public function provideBadRegistrations(): iterable
    {
        yield [
            [
                'emailAddress' => 'remi@mobilisation-eu.localhost',
                'firstName' => 'Rémi',
                'lastName' => 'Gardien',
                'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
                'plainPassword' => ['first' => null, 'second' => null],
                'address' => '123 random street',
                'city' => CityFixtures::CITY_02_UUID,
            ],
            [
                'actor.email_address.unique',
                'common.password.not_blank',
            ],
        ];

        yield [
            [
                'emailAddress' => 'REMI@mobilisation-eu.localhost',
                'firstName' => 'Rémi',
                'lastName' => 'Gardien',
                'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
                'plainPassword' => ['first' => '', 'second' => ''],
                'address' => '123 random street',
                'city' => CityFixtures::CITY_02_UUID,
            ],
            [
                'actor.email_address.unique',
                'common.password.not_blank',
            ],
        ];

        yield [
            [
                'emailAddress' => 'unknown@test',
                'firstName' => 'Rémi',
                'lastName' => 'Gardien',
                'birthday' => [],
                'plainPassword' => ['first' => '123', 'second' => '123'],
                'address' => '123 random street',
                'city' => 'abcdef',
            ],
            [
                'actor.email_address.valid',
                'actor.birthday.not_blank',
                'common.password.min_length',
                'common.city.invalid',
            ],
        ];

        yield [
            [
                'emailAddress' => null,
                'firstName' => null,
                'lastName' => null,
                'birthday' => ['year' => null, 'month' => 11, 'day' => 27],
                'plainPassword' => ['first' => 'test123', 'second' => '123test'],
                'address' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet ligula ut elit consectetur, quis vulputate felis vestibulum. Vivamus rutrum metus leo, in dignissim lectus fringilla nec.',
                'city' => null,
            ],
            [
                'actor.email_address.not_blank',
                'actor.first_name.not_blank',
                'actor.last_name.not_blank',
                'base.date.invalid',
                'common.password.mismatch',
                'common.city.invalid',
                'common.address.max_length',
            ],
        ];
    }

    /**
     * @dataProvider provideBadRegistrations
     */
    public function testRegisterFailure(array $fieldValues, array $errors): void
    {
        $this->client->request('GET', '/register');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('register.submit', $fieldValues);
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
    }

    public function testResendConfirmationSuccess(): void
    {
        $this->assertActorConfirmed('patrick@mobilisation-eu.localhost', false);

        $this->client->request('GET', '/register/resend-confirmation');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('actor.registration.resend_confirmation.submit', [
            'emailAddress' => 'patrick@mobilisation-eu.localhost',
        ]);
        $this->assertIsRedirectedTo('/register/resend-confirmation/check-email');
        $this->assertMailSent([
            'to' => 'patrick@mobilisation-eu.localhost',
            'subject' => 'mail.actor.registration_confirmation.subject',
            'body' => "@string@
                        .contains('mail.actor.registration_confirmation.body')
                        .matchRegex('#href=\"http://localhost/register/confirm/".self::UUID_PATTERN."#\"')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('A new mail has been sent with a link to confirm your account.');
        $this->assertActorConfirmed('patrick@mobilisation-eu.localhost', false);
    }

    public function testResendConfirmationUnknownEmail(): void
    {
        $this->client->request('GET', '/register/resend-confirmation');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Resend confirmation mail', [
            'emailAddress' => 'unknown@mobilisation-eu.localhost',
        ]);
        $this->assertIsRedirectedTo('/register/resend-confirmation/check-email');
        $this->assertNoMailSent();

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('A new mail has been sent with a link to confirm your account.');
    }

    public function provideResendConfirmationFailures(): iterable
    {
        yield [
            'email' => 'leonard@mobilisation-eu.localhost',
            'alreadyConfirmed' => false,
            'redirectedTo' => '/login',
            'errors' => ['actor.registration.resend_confirmation.flash.pending_token'],
        ];

        yield [
            'email' => 'remi@mobilisation-eu.localhost',
            'alreadyConfirmed' => true,
            'redirectedTo' => '/login',
            'errors' => ['actor.registration.resend_confirmation.flash.already_confirmed'],
        ];
    }

    /**
     * @dataProvider provideResendConfirmationFailures
     */
    public function testResendConfirmationFailure(
        string $email,
        bool $alreadyConfirmed,
        string $redirectedTo,
        array $errors
    ): void {
        $this->assertActorConfirmed($email, $alreadyConfirmed);

        $this->client->request('GET', '/register/resend-confirmation');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('actor.registration.resend_confirmation.submit', ['emailAddress' => $email]);
        $this->assertIsRedirectedTo($redirectedTo);
        $this->assertNoMailSent();

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
        $this->assertActorConfirmed($email, $alreadyConfirmed);
    }

    public function testConfirmSuccess(): void
    {
        $this->assertActorConfirmed('leonard@mobilisation-eu.localhost', false);

        $this->client->request('GET', '/register/confirm/'.ConfirmTokenFixtures::TOKEN_04_UUID);
        $this->assertIsRedirectedTo('/register/confirmed');
        $this->assertMailSent([
            'to' => 'leonard@mobilisation-eu.localhost',
            'subject' => 'mail.actor.registration_complete.subject',
            'body' => "@string@.contains('mail.actor.registration_complete.body')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains([
            'Your registration is now complete.',
            'Closest groups',
            'Ecology in Nice',
            'Culture in Cannes',
        ]);
        $this->assertActorConfirmed('leonard@mobilisation-eu.localhost', true);
    }

    public function provideConfirmationFailures(): iterable
    {
        // token is already consumed
        yield [
            'email' => 'remi@mobilisation-eu.localhost',
            'alreadyConfirmed' => true,
            'token' => ConfirmTokenFixtures::TOKEN_01_UUID,
            'redirectedTo' => '/login',
            'errors' => ['actor.registration.confirm.flash.already_confirmed'],
        ];

        // token is expired but user is now confirmed
        yield [
            'email' => 'titouan@mobilisation-eu.localhost',
            'alreadyConfirmed' => true,
            'token' => ConfirmTokenFixtures::TOKEN_02_UUID,
            'redirectedTo' => '/login',
            'errors' => ['actor.registration.confirm.flash.already_confirmed'],
        ];

        // token is expired
        yield [
            'email' => 'patrick@mobilisation-eu.localhost',
            'alreadyConfirmed' => false,
            'token' => ConfirmTokenFixtures::TOKEN_05_UUID,
            'redirectedTo' => '/register/resend-confirmation',
            'errors' => ['actor.registration.confirm.flash.token_expired'],
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
        $actorRepository = $this->getActorRepository();
        $actorRepository->clear();

        $this->assertSame($expected, $actorRepository->findOneByEmail($email)->isConfirmed());
    }
}
