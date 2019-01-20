<?php

namespace Test\App\Controller;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ProfileControllerTest extends HttpTestCase
{
    public function testEditSuccess(): void
    {
        $this->authenticateActor('remi@mobilisation.eu');

        $crawler = $this->client->request('GET', '/profile');
        $this->assertResponseSuccessFul();

        $form = $crawler->selectButton('Save')->form();
        $this->assertTrue($form->get('emailAddress')->isDisabled());
        $this->assertEquals('remi@mobilisation.eu', $form->get('emailAddress')->getValue());
        $this->assertEquals('Rémi', $form->get('firstName')->getValue());
        $this->assertEquals('Gardien', $form->get('lastName')->getValue());
        $this->assertEmpty($form->get('gender')->getValue());

        $birthday = $form->get('birthday');
        $this->assertEquals(
            ['year' => 1988, 'month' => 11, 'day' => 27],
            [
                'year' => $birthday['year']->getValue(),
                'month' => $birthday['month']->getValue(),
                'day' => $birthday['day']->getValue(),
            ]
        );

        $this->client->submit($crawler->selectButton('Save')->form([
            'firstName' => 'Rem',
            'lastName' => 'Gar',
            'birthday' => ['year' => 1988, 'month' => 01, 'day' => 12],
            'gender' => 'male',
        ]));
        $this->assertIsRedirectedTo('/profile');

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseCOntains('Your profile has been successfully saved.');

        $form = $crawler->selectButton('Save')->form();
        $this->assertTrue($form->get('emailAddress')->isDisabled());
        $this->assertEquals('remi@mobilisation.eu', $form->get('emailAddress')->getValue());
        $this->assertEquals('Rem', $form->get('firstName')->getValue());
        $this->assertEquals('Gar', $form->get('lastName')->getValue());
        $this->assertEquals('male', $form->get('gender')->getValue());

        $birthday = $form->get('birthday');
        $this->assertEquals(
            ['year' => 1988, 'month' => 01, 'day' => 12],
            [
                'year' => $birthday['year']->getValue(),
                'month' => $birthday['month']->getValue(),
                'day' => $birthday['day']->getValue(),
            ]
        );
    }

    public function provideBadProfiles(): iterable
    {
        yield [
            'firstName' => null,
            'lastName' => null,
            'gender' => null,
            'birthday' => ['year' => null, 'month' => 11, 'day' => 27],
            'errors' => [
                'Please enter your first name.',
                'Please enter your last name.',
                'This date is not valid.',
                'Please select a gender.',
            ],
        ];
    }

    /**
     * @dataProvider provideBadProfiles
     */
    public function testEditFailure(
        ?string $firstName,
        ?string $lastName,
        ?string $gender,
        ?array $birthday,
        array $errors
    ): void {
        $this->authenticateActor('remi@mobilisation.eu');

        $crawler = $this->client->request('GET', '/profile');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Save')->form([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'gender' => $gender,
            'birthday' => $birthday,
        ]));
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
    }

    public function testChangePasswordSuccess(): void
    {
        $this->authenticateActor('remi@mobilisation.eu');

        $crawler = $this->client->request('GET', '/profile/password');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Change password')->form([
            'password' => [
                'first' => 'new_password',
                'second' => 'new_password',
            ],
        ]));
        $this->assertIsRedirectedTo('/profile');
        $this->assertMailSent([
            'to' => 'remi@mobilisation.eu',
            'subject' => 'Your password has been successfully changed.',
            'body' => "@string@
                        .contains('Hello Rémi!')
                        .contains('Your password has been successfully changed.')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseContains('Your password has been successfully changed.');

        $this->client->request('GET', '/logout');
        $this->assertIsRedirectedTo($this->getAbsoluteUrl('/login'));

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Sign')->form([
            'emailAddress' => 'remi@mobilisation.eu',
            'password' => 'new_password',
        ]));
        $this->assertIsRedirectedTo('/');

        // ensure user is not logged out
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

        $crawler = $this->client->request('GET', '/profile/password');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Change password')->form([
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
