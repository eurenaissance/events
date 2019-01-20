<?php

namespace Test\App\Controller;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ProfileControllerTest extends HttpTestCase
{
    public function testEdit(): void
    {
        $this->authenticateActor('remi@mobilisation.eu');

        $crawler = $this->client->request('GET', '/profile');
        $this->assertResponseSuccessFul();

        $form = $crawler->selectButton('Save')->form();
        self::assertTrue($form->get('emailAddress')->isDisabled());
        self::assertEquals('remi@mobilisation.eu', $form->get('emailAddress')->getValue());
        self::assertEquals('Rémi', $form->get('firstName')->getValue());
        self::assertEquals('Gardien', $form->get('lastName')->getValue());
        self::assertEmpty($form->get('gender')->getValue());

        $birthday = $form->get('birthday');
        self::assertEquals(
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

        $form = $crawler->selectButton('Save')->form();
        self::assertTrue($form->get('emailAddress')->isDisabled());
        self::assertEquals('remi@mobilisation.eu', $form->get('emailAddress')->getValue());
        self::assertEquals('Rem', $form->get('firstName')->getValue());
        self::assertEquals('Gar', $form->get('lastName')->getValue());
        self::assertEquals('male', $form->get('gender')->getValue());

        $birthday = $form->get('birthday');
        self::assertEquals(
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
            'gender' => 'male',
            'birthday' => ['year' => 2000, 'month' => 11, 'day' => 31],
            'errors' => [
                'common.first_name.not_blank',
                'common.last_name.not_blank',
                'common.date.invalid',
            ],
        ];

        yield [
            'firstName' => 'Rémi',
            'lastName' => 'Gardien',
            'gender' => null,
            'birthday' => ['year' => 1988, 'month' => 11, 'day' => 27],
            'errors' => ['common.gender.not_blank'],
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
}
