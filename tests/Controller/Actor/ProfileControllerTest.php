<?php

namespace Test\App\Controller\Actor;

use App\DataFixtures\CityFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ProfileControllerTest extends HttpTestCase
{
    public function testChangeNotificationSuccess(): void
    {
        $this->authenticateActor('remi@mobilisation-eu.localhost');

        // Enable notifications
        $crawler = $this->client->request('GET', '/profile/notifications');
        $this->assertResponseSuccessful();

        $form = $crawler->selectButton('actor.profile.notification.submit')->form();
        $this->assertArraySubset([], $form->getPhpValues());

        $this->client->submit($form, [
            'notificationEnabled' => '1',
        ]);
        $this->assertIsRedirectedTo('/profile/notifications');
        $this->client->followRedirect();
        $this->assertResponseContains('flashes.profile.notification_success');

        // disable notifications
        $crawler = $this->client->request('GET', '/profile/notifications');
        $this->assertResponseSuccessful();

        $form = $crawler->selectButton('actor.profile.notification.submit')->form();
        $this->assertArraySubset(
            ['notificationEnabled' => '1'],
            $form->getPhpValues()
        );

        $this->client->submit($form, []);
        $this->assertIsRedirectedTo('/profile/notifications');
        $this->client->followRedirect();
        $this->assertResponseContains('flashes.profile.notification_success');

        // ensure user is logged in
        $this->client->request('GET', '/profile/notifications');
        $this->assertResponseSuccessful();
    }

    public function provideRequestsForAnonymous(): iterable
    {
        yield ['GET', '/profile'];
        yield ['POST', '/profile', [
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'gender' => 'male',
            'address' => '3 random street',
            'country' => 'FR',
            'zipCode' => '92270',
            'city' => CityFixtures::CITY_04_UUID,
            'birthday' => ['year' => '1988', 'month' => '11', 'day' => '27'],
        ]];
        yield ['GET', '/profile/change-password'];
        yield ['POST', '/profile/change-password', [
            'plainPassword' => ['first' => 'test@12345', 'second' => 'test@12345'],
            'oldPassword' => 'test@12345',
        ]];
    }

    /**
     * @dataProvider provideRequestsForAnonymous
     */
    public function testAnonymousCannotEditProfile(string $method, string $uri, array $parameters = []): void
    {
        $this->client->request($method, $uri, $parameters);
        $this->assertIsRedirectedTo('/login');
    }

    public function provideProfileEditions(): iterable
    {
        yield [
            'remi@mobilisation-eu.localhost',
            [
                'firstName' => 'Rémi',
                'lastName' => 'Gardien',
                'gender' => 'male',
                'address' => '',
                'country' => 'FR',
                'zipCode' => '92270',
                'city' => CityFixtures::CITY_04_UUID,
                'birthday' => ['year' => '1988', 'month' => '11', 'day' => '27'],
            ],
            [
                'firstName' => 'Rem',
                'lastName' => 'Gar',
                'gender' => 'male',
                'address' => '789 random street',
                'country' => 'FR',
                'zipCode' => '75000',
                'city' => CityFixtures::CITY_01_UUID,
                'birthday' => ['year' => '1988', 'month' => '1', 'day' => '12'],
            ],
        ];

        yield [
            'titouan@mobilisation-eu.localhost',
            [
                'firstName' => 'Titouan',
                'lastName' => 'Galopin',
                'gender' => 'male',
                'address' => '',
                'country' => 'FR',
                'zipCode' => '92110',
                'city' => CityFixtures::CITY_02_UUID,
                'birthday' => ['year' => '1994', 'month' => '12', 'day' => '1'],
            ],
            [
                'firstName' => 'El Titouan',
                'lastName' => 'G.',
                'gender' => 'male',
                'address' => '456 random street',
                'country' => 'FR',
                'zipCode' => '92270',
                'city' => CityFixtures::CITY_04_UUID,
                'birthday' => ['year' => '1995', 'month' => '5', 'day' => '5'],
            ],
        ];

        yield [
            'nicolas@mobilisation-eu.localhost',
            [
                'firstName' => 'Nicolas',
                'lastName' => 'Cage',
                'gender' => 'male',
                'address' => '123 random street',
                'country' => 'FR',
                'zipCode' => '06400',
                'city' => CityFixtures::CITY_06_UUID,
                'birthday' => ['year' => '1964', 'month' => '1', 'day' => '7'],
            ],
            [
                'firstName' => 'Nic',
                'lastName' => 'Cag',
                'gender' => 'other',
                'address' => '123 random street',
                'country' => 'FR',
                'zipCode' => '06000',
                'city' => CityFixtures::CITY_05_UUID,
                'birthday' => ['year' => '2000', 'month' => '2', 'day' => '20'],
            ],
        ];
    }

    /**
     * @dataProvider provideProfileEditions
     */
    public function testEditSuccess(string $email, array $actualProfile, array $editedProfile): void
    {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', '/profile');
        $this->assertResponseSuccessful();

        $form = $crawler->selectButton('actor.profile.edit.submit')->form();
        $emailField = $form->get('emailAddress');
        $this->assertTrue($emailField->isDisabled());
        $this->assertSame($email, $emailField->getValue());
        $this->assertArraySubset($actualProfile, $form->getPhpValues());

        $this->client->submit($form, $editedProfile);
        $this->assertIsRedirectedTo('/profile');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertResponseContains('flashes.profile.account_success');

        $form = $crawler->selectButton('actor.profile.edit.submit')->form();
        $emailField = $form->get('emailAddress');
        $this->assertTrue($emailField->isDisabled());
        $this->assertSame($email, $emailField->getValue());
        $this->assertArraySubset($editedProfile, $form->getPhpValues());
    }

    public function provideBadProfileEditions(): iterable
    {
        yield [
            [
                'firstName' => null,
                'lastName' => null,
                'gender' => 'male',
                'birthday' => ['year' => null, 'month' => '11', 'day' => '27'],
                'address' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet ligula ut elit consectetur, quis vulputate felis vestibulum. Vivamus rutrum metus leo, in dignissim lectus fringilla nec.',
                'country' => 'FR',
                'zipCode' => null,
                'city' => 'abcdef',
            ],
            'errors' => [
                'actor.first_name.not_blank',
                'actor.last_name.not_blank',
                'common.date.invalid',
                'common.city.invalid',
                'common.address.max_length',
            ],
        ];
    }

    /**
     * @dataProvider provideBadProfileEditions
     */
    public function testEditFailure(array $fieldValues, array $errors): void
    {
        $this->authenticateActor('remi@mobilisation-eu.localhost');

        $this->client->request('GET', '/profile');
        $this->assertResponseSuccessful();

        $this->client->submitForm('actor.profile.edit.submit', $fieldValues);
        $this->assertResponseSuccessful();
        $this->assertResponseContains($errors);
    }

    public function providePasswordChanges(): iterable
    {
        yield ['titouan@mobilisation-eu.localhost', 'Titouan', 'secret!321', 'secret!12345'];
        yield ['marine@mobilisation-eu.localhost', 'Marine', '654_pass_123', 'secret!12345'];
        yield ['nicolas@mobilisation-eu.localhost', 'Nicolas', 'n3W_P@sS', 'secret!12345'];
        // actor with pending reset password token
        yield ['remi@mobilisation-eu.localhost', 'Rémi', 'new_password!123', 'secret!12345'];
    }

    /**
     * @dataProvider providePasswordChanges
     */
    public function testChangePasswordSuccess(string $email, string $firstName, string $newPassword, string $currentPassword): void
    {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', '/profile/change-password');
        $this->assertResponseSuccessful();

        $form = $crawler->selectButton('actor.profile.change_password.submit')->form();
        $formData = [
            'plainPassword' => [
                'first' => '',
                'second' => '',
            ],
            'currentPassword' => '',
        ];
        $this->assertArraySubset($formData, $form->getPhpValues());

        $this->client->submit($form, [
            'plainPassword' => [
                'first' => $newPassword,
                'second' => $newPassword,
            ],
            'currentPassword' => $currentPassword,
        ]);
        $this->assertIsRedirectedTo('/profile');
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'mail.actor.password_changed.subject',
            'body' => "@string@.contains('mail.actor.password_changed.body')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseContains('flashes.profile.password_success');

        // ensure user is not logged out after this request
        $this->client->request('GET', '/profile');
        $this->assertResponseSuccessful();

        $this->client->request('GET', '/logout');
        $this->assertIsRedirectedTo($this->getAbsoluteUrl('/login'));

        $this->client->followRedirect();
        $this->assertResponseSuccessful();

        $this->client->submitForm('login.button', [
            'emailAddress' => $email,
            'password' => $newPassword,
        ]);
        $this->assertIsRedirectedTo('/');

        // ensure user is logged in
        $this->client->request('GET', '/profile');
        $this->assertResponseSuccessful();
    }

    public function provideBadPasswordChanges(): iterable
    {
        yield [
            'first' => 'test',
            'second' => 'test',
            'currentPassword' => 'test',
            'error' => 'common.password.min_length',
        ];

        yield [
            'first' => 'test123',
            'second' => '123test',
            'currentPassword' => 'test',
            'error' => 'common.password.mismatch',
        ];

        yield [
            'first' => 'test123',
            'second' => '123test',
            'currentPassword' => '',
            'error' => 'actor.current_password.invalid',
        ];

        yield [
            'first' => 'test123',
            'second' => 'test123',
            'currentPassword' => 'wrongpassword',
            'error' => 'actor.current_password.invalid',
        ];
    }

    /**
     * @dataProvider provideBadPasswordChanges
     */
    public function testChangePasswordFailure(string $first, string $second, string $currentPassword, string $error): void
    {
        $initialPassword = $this->getActorRepository()->findOneByEmail('remi@mobilisation-eu.localhost')->getPassword();

        $this->authenticateActor('remi@mobilisation-eu.localhost');

        $this->client->request('GET', '/profile/change-password');
        $this->assertResponseSuccessful();

        $this->client->submitForm('actor.profile.change_password.submit', [
            'plainPassword' => [
                'first' => $first,
                'second' => $second,
            ],
            'currentPassword' => $currentPassword,
        ]);
        $this->assertResponseSuccessful();
        $this->assertResponseContains($error);

        // ensure user is not logged out
        $this->client->request('GET', '/profile');
        $this->assertResponseSuccessful();

        $finalPassword = $this->getActorRepository()->findOneByEmail('remi@mobilisation-eu.localhost')->getPassword();
        $this->assertSame($initialPassword, $finalPassword);
    }
}
