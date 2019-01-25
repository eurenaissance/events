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
            'city' => CityFixtures::CITY_02_UUID,
            'birthday' => ['year' => '1988', 'month' => '11', 'day' => '27'],
        ]];
        yield ['GET', '/profile/change-password'];
        yield ['POST', '/profile/change-password', [
            'password' => ['first' => 'test@12345', 'second' => 'test@12345'],
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
            'remi@mobilisation.eu',
            [
                'firstName' => 'Rémi',
                'lastName' => 'Gardien',
                'gender' => '',
                'address' => '',
                'country' => 'FR',
                'zipCode' => '92270',
                'city' => CityFixtures::CITY_02_UUID,
                'birthday' => ['year' => '1988', 'month' => '11', 'day' => '27'],
            ],
            [
                'firstName' => 'Rem',
                'lastName' => 'Gar',
                'gender' => 'male',
                'address' => '3 random street',
                'country' => 'FR',
                'zipCode' => '75000',
                'city' => CityFixtures::CITY_01_UUID,
                'birthday' => ['year' => '1988', 'month' => '1', 'day' => '12'],
            ],
        ];

        yield [
            'titouan@mobilisation.eu',
            [
                'firstName' => 'Titouan',
                'lastName' => 'Galopin',
                'gender' => 'male',
                'address' => '',
                'country' => 'FR',
                'zipCode' => '75000',
                'city' => CityFixtures::CITY_01_UUID,
                'birthday' => ['year' => '1994', 'month' => '12', 'day' => '1'],
            ],
            [
                'firstName' => 'El Titouan',
                'lastName' => 'G.',
                'gender' => 'male',
                'address' => '',
                'country' => 'FR',
                'zipCode' => '92270',
                'city' => CityFixtures::CITY_02_UUID,
                'birthday' => ['year' => '1995', 'month' => '5', 'day' => '5'],
            ],
        ];

        yield [
            'jane@mobilisation.eu',
            [
                'firstName' => 'Jane',
                'lastName' => 'Doe',
                'gender' => 'female',
                'address' => '4 random street',
                'country' => 'FR',
                'zipCode' => '75000',
                'city' => CityFixtures::CITY_01_UUID,
                'birthday' => ['year' => '1976', 'month' => '2', 'day' => '13'],
            ],
            [
                'firstName' => 'Jane',
                'lastName' => 'Doe',
                'gender' => 'other',
                'address' => '',
                'country' => 'FR',
                'zipCode' => '35420',
                'city' => CityFixtures::CITY_03_UUID,
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
        $this->assertTrue($form->get('emailAddress')->isDisabled());
        $this->assertSame($email, $form->get('emailAddress')->getValue());
        $this->assertSame($actualProfile['firstName'], $form->get('firstName')->getValue());
        $this->assertSame($actualProfile['lastName'], $form->get('lastName')->getValue());
        $this->assertSame($actualProfile['gender'], $form->get('gender')->getValue());
        $this->assertSame($actualProfile['address'], $form->get('address')->getValue());
        $this->assertSame($actualProfile['country'], $form->get('country')->getValue());
        $this->assertSame($actualProfile['zipCode'], $form->get('zipCode')->getValue());
        $this->assertSame($actualProfile['city'], $form->get('city')->getValue());

        /** @var \Symfony\Component\DomCrawler\Field\FormField[] $birthday */
        $birthday = $form->get('birthday');
        $this->assertSame(
            $actualProfile['birthday'],
            [
                'year' => $birthday['year']->getValue(),
                'month' => $birthday['month']->getValue(),
                'day' => $birthday['day']->getValue(),
            ]
        );

        $this->client->submit($crawler->selectButton('Save my profile')->form($editedProfile));
        $this->assertIsRedirectedTo('/profile');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseCOntains('Your profile has been successfully saved.');

        $form = $crawler->selectButton('Save my profile')->form();
        $this->assertTrue($form->get('emailAddress')->isDisabled());
        $this->assertSame($email, $form->get('emailAddress')->getValue());
        $this->assertSame($editedProfile['firstName'], $form->get('firstName')->getValue());
        $this->assertSame($editedProfile['lastName'], $form->get('lastName')->getValue());
        $this->assertSame($editedProfile['gender'], $form->get('gender')->getValue());
        $this->assertSame($editedProfile['address'], $form->get('address')->getValue());
        $this->assertSame($editedProfile['country'], $form->get('country')->getValue());
        $this->assertSame($editedProfile['zipCode'], $form->get('zipCode')->getValue());
        $this->assertSame($editedProfile['city'], $form->get('city')->getValue());

        /** @var \Symfony\Component\DomCrawler\Field\FormField[] $birthday */
        $birthday = $form->get('birthday');
        $this->assertSame(
            $editedProfile['birthday'],
            [
                'year' => $birthday['year']->getValue(),
                'month' => $birthday['month']->getValue(),
                'day' => $birthday['day']->getValue(),
            ]
        );
    }

    public function provideBadProfileEditions(): iterable
    {
        yield [
            'firstName' => null,
            'lastName' => null,
            'gender' => null,
            'birthday' => ['year' => null, 'month' => '11', 'day' => '27'],
            'address' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet ligula ut elit consectetur, quis vulputate felis vestibulum. Vivamus rutrum metus leo, in dignissim lectus fringilla nec.',
            'country' => 'FR',
            'zipCode' => null,
            'city' => 'abcdef',
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
    public function testEditFailure(
        ?string $firstName,
        ?string $lastName,
        ?string $gender,
        ?array $birthday,
        ?string $address,
        ?string $country,
        ?string $zipCode,
        ?string $cityUuid,
        array $errors
    ): void {
        $this->authenticateActor('remi@mobilisation.eu');

        $crawler = $this->client->request('GET', '/profile');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Save my profile')->form([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'gender' => $gender,
            'birthday' => $birthday,
            'address' => $address,
            'country' => $country,
            'zipCode' => $zipCode,
            'city' => $cityUuid,
        ]));
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
    }

    public function providePasswordChanges(): iterable
    {
        yield ['remi@mobilisation.eu', 'Rémi', 'new_password!123'];
        yield ['john@mobilisation.eu', 'John', 'n3W_P@sS'];
        yield ['jane@mobilisation.eu', 'Jane', '654_pass_123'];
        // actor with pending reset password token
        yield ['titouan@mobilisation.eu', 'Titouan', 'secret!321'];
    }

    /**
     * @dataProvider providePasswordChanges
     */
    public function testChangePasswordSuccess(string $email, string $firstName, string $newPassword): void
    {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', '/profile/change-password');
        $this->assertResponseSuccessFul();

        /** @var \Symfony\Component\DomCrawler\Field\FormField[] $password */
        $password = $crawler->selectButton('Change my password')->form()->get('password');
        $this->assertSame('', $password['first']->getValue());
        $this->assertSame('', $password['second']->getValue());

        $this->client->submit($crawler->selectButton('Change my password')->form([
            'password' => [
                'first' => $newPassword,
                'second' => $newPassword,
            ],
        ]));
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

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Sign in')->form([
            'emailAddress' => $email,
            'password' => $newPassword,
        ]));
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
        $initialPassword = $this->getActorRepository()->findOneByEmail('remi@mobilisation.eu')->getPassword();

        $this->authenticateActor('remi@mobilisation.eu');

        $crawler = $this->client->request('GET', '/profile/change-password');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Change my password')->form([
            'password' => ['first' => $first, 'second' => $second],
        ]));
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($error);

        // ensure user is not logged out
        $this->client->request('GET', '/profile');
        $this->assertResponseSuccessFul();

        $finalPassword = $this->getActorRepository()->findOneByEmail('remi@mobilisation.eu')->getPassword();
        $this->assertSame($initialPassword, $finalPassword);
    }
}
