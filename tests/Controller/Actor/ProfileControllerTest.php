<?php

namespace Test\App\Controller\Actor;

use App\DataFixtures\CityFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ProfileControllerTest extends HttpTestCase
{
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
                'gender' => '',
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
                'address' => '',
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
        $this->assertResponseSuccessFul();

        $form = $crawler->selectButton('Save my profile')->form();
        $emailField = $form->get('emailAddress');
        $this->assertTrue($emailField->isDisabled());
        $this->assertSame($email, $emailField->getValue());
        $this->assertArraySubset($actualProfile, $form->getPhpValues());

        $this->client->submit($form, $editedProfile);
        $this->assertIsRedirectedTo('/profile');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Your profile has been successfully saved.');

        $form = $crawler->selectButton('Save my profile')->form();
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
                'gender' => null,
                'birthday' => ['year' => null, 'month' => '11', 'day' => '27'],
                'address' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet ligula ut elit consectetur, quis vulputate felis vestibulum. Vivamus rutrum metus leo, in dignissim lectus fringilla nec.',
                'country' => 'FR',
                'zipCode' => null,
                'city' => 'abcdef',
            ],
            'errors' => [
                'Please enter your first name.',
                'Please enter your last name.',
                'Please select your gender.',
                'This date is not valid.',
                'This city is not valid.',
                'The address can not exceed 150 characters.',
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
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Save my profile', $fieldValues);
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
    }

    public function providePasswordChanges(): iterable
    {
        yield ['titouan@mobilisation-eu.localhost', 'Titouan', 'secret!321'];
        yield ['marine@mobilisation-eu.localhost', 'Marine', '654_pass_123'];
        yield ['nicolas@mobilisation-eu.localhost', 'Nicolas', 'n3W_P@sS'];
        // actor with pending reset password token
        yield ['remi@mobilisation-eu.localhost', 'Rémi', 'new_password!123'];
    }

    /**
     * @dataProvider providePasswordChanges
     */
    public function testChangePasswordSuccess(string $email, string $firstName, string $newPassword): void
    {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', '/profile/change-password');
        $this->assertResponseSuccessFul();

        $form = $crawler->selectButton('Change my password')->form();
        $this->assertArraySubset(['plainPassword' => ['first' => '', 'second' => '']], $form->getPhpValues());

        $this->client->submit($form, [
            'plainPassword' => [
                'first' => $newPassword,
                'second' => $newPassword,
            ],
        ]);
        $this->assertIsRedirectedTo('/profile');
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'Your password has been successfully changed.',
            'body' => "@string@
                        .contains('Hello $firstName!')
                        .contains('Your password has been successfully changed.')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseContains('Your password has been successfully changed.');

        // ensure user is not logged out after this request
        $this->client->request('GET', '/profile');
        $this->assertResponseSuccessFul();

        $this->client->request('GET', '/logout');
        $this->assertIsRedirectedTo($this->getAbsoluteUrl('/login'));

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Log in', [
            'emailAddress' => $email,
            'password' => $newPassword,
        ]);
        $this->assertIsRedirectedTo('/');

        // ensure user is logged in
        $this->client->request('GET', '/profile');
        $this->assertResponseSuccessFul();
    }

    public function provideBadPasswordChanges(): iterable
    {
        yield [
            'first' => 'test',
            'second' => 'test',
            'error' => 'Password must be at least 6 characters long.',
        ];

        yield [
            'first' => 'test123',
            'second' => '123test',
            'error' => 'Passwords do not match.',
        ];
    }

    /**
     * @dataProvider provideBadPasswordChanges
     */
    public function testChangePasswordFailure(string $first, string $second, string $error): void
    {
        $initialPassword = $this->getActorRepository()->findOneByEmail('remi@mobilisation-eu.localhost')->getPassword();

        $this->authenticateActor('remi@mobilisation-eu.localhost');

        $this->client->request('GET', '/profile/change-password');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Change my password', [
            'plainPassword' => [
                'first' => $first,
                'second' => $second,
            ],
        ]);
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($error);

        // ensure user is not logged out
        $this->client->request('GET', '/profile');
        $this->assertResponseSuccessFul();

        $finalPassword = $this->getActorRepository()->findOneByEmail('remi@mobilisation-eu.localhost')->getPassword();
        $this->assertSame($initialPassword, $finalPassword);
    }
}
