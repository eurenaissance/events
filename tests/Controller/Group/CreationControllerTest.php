<?php

namespace Test\App\Controller;

use App\DataFixtures\CityFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class CreationControllerTest extends HttpTestCase
{
    public function testAnonymousCannotCreateGroup(): void
    {
        $this->client->request('GET', '/group/create');
        $this->assertIsRedirectedTo('/login');

        $this->client->request('POST', '/group/create', [
            'name' => 'My new group',
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertIsRedirectedTo('/login');
    }

    public function provideActorsForCreateSuccess(): iterable
    {
        yield ['remi@mobilisation.eu', 'Rémi']; // animator of a refused group
        yield ['titouan@mobilisation.eu', 'Titouan']; // animator of a confirmed group
        yield ['jane@mobilisation.eu', 'Jane']; // no relation with any group
    }

    /**
     * @dataProvider provideActorsForCreateSuccess
     */
    public function testCreateSuccess(string $email, string $firstName): void
    {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', '/group/create');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Create')->form([
            'name' => 'My new group',
            'city' => CityFixtures::CITY_02_UUID,
        ]));
        $this->assertIsRedirectedTo('/group/my-new-group');
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'Your group "My new group" has been created.',
            'body' => "@string@
                        .contains('Hello $firstName!')
                        .contains('Please wait for an admin approval.')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('Group: My new group');
        $this->assertResponseContains('Your group is waiting for admin approval.');

        $group = $this->getGroupRepository()->findOneBySlug('my-new-group');
        $this->assertNotNull($group);
        $this->assertSame($email, $group->getAnimator()->getEmailAddress());
        $this->assertTrue($group->isPending());
    }

    public function testActorWithPendingGroupCannotCreateGroup(): void
    {
        $this->authenticateActor('john@mobilisation.eu');

        $this->client->request('GET', '/group/create');
        $this->assertAccessDeniedResponse();

        $this->client->request('POST', '/group/create', [
            'name' => 'My new group',
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertAccessDeniedResponse();
    }

    public function provideBadCreations(): iterable
    {
        yield [
            'name' => null,
            'city' => null,
            'errors' => [
                'Please enter a group name.',
                'This city is not valid.',
            ],
        ];

        yield [
            'name' => 'This is a confirmed group',
            'city' => CityFixtures::CITY_02_UUID,
            'errors' => ['A group named &quot;&quot;This is a confirmed group&quot;&quot; already exists.'],
        ];

        yield [
            'name' => 'Thïs-îs-à-confirmèd-groûp',
            'city' => CityFixtures::CITY_02_UUID,
            'errors' => ['A group with a URL &quot;&quot;this-is-a-confirmed-group&quot;&quot; already exists.'],
        ];
    }

    /**
     * @dataProvider provideBadCreations
     */
    public function testCreateFailure(?string $name, ?string $city, array $errors): void
    {
        $this->authenticateActor('nicolas@mobilisation.eu');

        $crawler = $this->client->request('GET', '/group/create');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Create')->form([
            'name' => $name,
            'city' => $city,
        ]));
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
        $this->assertNull($this->getGroupRepository()->findOneBy([
            'animator' => $this->getActorRepository()->findOneByEmail('nicolas@mobilisation.eu'),
            'name' => $name,
        ]));
    }
}
