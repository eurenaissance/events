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
        // animator of a refused group
        yield ['remi@mobilisation-eu.code', 'Rémi', 'My new group', 'my-new-group'];
        // animator of a confirmed group
        yield ['titouan@mobilisation-eu.code', 'Titouan', 'A cool group', 'a-cool-group'];
        // no relation with any group
        yield ['didier@mobilisation-eu.code', 'Didier', 'Best new group', 'best-new-group'];
        yield ['francis@mobilisation-eu.code', 'Francis', 'My new group', 'my-new-group'];
    }

    /**
     * @dataProvider provideActorsForCreateSuccess
     */
    public function testCreateSuccess(string $email, string $firstName, string $groupName, string $groupSlug): void
    {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', '/group/create');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Create')->form(), [
            'name' => $groupName,
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertIsRedirectedTo("/group/$groupSlug");
        $this->assertMailSent([
            'to' => $email,
            'subject' => "Your group \"$groupName\" has been created.",
            'body' => "@string@
                        .contains('Hello $firstName!')
                        .contains('Please wait for an admin approval.')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains("<h1>$groupName</h1>");
        $this->assertResponseContains('Your group is waiting for admin approval.');

        $group = $this->getGroupRepository()->findOneBySlug($groupSlug);
        $this->assertNotNull($group);
        $this->assertSame($email, $group->getAnimator()->getEmailAddress());
        $this->assertTrue($group->isPending());
    }

    public function testActorWithPendingGroupCannotCreateGroup(): void
    {
        $this->authenticateActor('marine@mobilisation-eu.code');

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

        // a confirmed group with this name already exists
        yield [
            'name' => 'Ecology in Paris',
            'city' => CityFixtures::CITY_02_UUID,
            'errors' => ['A group named &quot;&quot;Ecology in Paris&quot;&quot; already exists.'],
        ];

        // a confirmed group with this slug already exists
        yield [
            'name' => 'Ecolôgy-în Pârïs ',
            'city' => CityFixtures::CITY_02_UUID,
            'errors' => ['A group with a URL &quot;&quot;ecology-in-paris&quot;&quot; already exists.'],
        ];

        // a pending group with this name already exists
        yield [
            'name' => 'Culture in Paris',
            'city' => CityFixtures::CITY_02_UUID,
            'errors' => ['A group named &quot;&quot;Culture in Paris&quot;&quot; already exists.'],
        ];

        // a pending group with this slug already exists
        yield [
            'name' => 'Cûltüré in-Pârïs-',
            'city' => CityFixtures::CITY_02_UUID,
            'errors' => ['A group with a URL &quot;&quot;culture-in-paris&quot;&quot; already exists.'],
        ];

        // a refused group with this name already exists
        yield [
            'name' => 'Development in Bois-Colombes',
            'city' => CityFixtures::CITY_02_UUID,
            'errors' => ['A group named &quot;&quot;Development in Bois-Colombes&quot;&quot; already exists.'],
        ];

        // a refused group with this slug already exists
        yield [
            'name' => 'Dévelôpmént-in bôïs côlômbès ',
            'city' => CityFixtures::CITY_02_UUID,
            'errors' => ['A group with a URL &quot;&quot;development-in-bois-colombes&quot;&quot; already exists.'],
        ];
    }

    /**
     * @dataProvider provideBadCreations
     */
    public function testCreateFailure(?string $name, ?string $city, array $errors): void
    {
        $this->authenticateActor('remi@mobilisation-eu.code');

        $crawler = $this->client->request('GET', '/group/create');
        $this->assertResponseSuccessFul();

        $this->client->submit($crawler->selectButton('Create')->form(), [
            'name' => $name,
            'city' => $city,
        ]);
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
        $this->assertNull($this->getGroupRepository()->findOneBy([
            'animator' => $this->getActorRepository()->findOneByEmail('remi@mobilisation-eu.code'),
            'name' => $name,
        ]));
    }
}
