<?php

namespace Test\App\Controller\Group;

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
            'description' => 'Description of my new group',
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertIsRedirectedTo('/login');
    }

    public function provideActorsForCreateSuccess(): iterable
    {
        // animator of a refused group
        yield [
            'remi@mobilisation-eu.localhost',
            'My new group',
            'my-new-group',
            'Description of my very new group.',
        ];

        // animator of a confirmed group
        yield [
            'titouan@mobilisation-eu.localhost',
            'A cool group',
            'a-cool-group',
            'Description of a very cool group.',
        ];

        // no relation with any group
        yield [
            'didier@mobilisation-eu.localhost',
            'Best new group',
            'best-new-group',
            'Description of the group.',
        ];

        yield [
            'francis@mobilisation-eu.localhost',
            'My new group',
            'my-new-group',
            'Description of the new group.',
        ];
    }

    /**
     * @dataProvider provideActorsForCreateSuccess
     */
    public function testCreateSuccess(
        string $email,
        string $groupName,
        string $groupSlug,
        string $groupDescription
    ): void {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/create');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('group_create.submit', [
            'name' => $groupName,
            'description' => $groupDescription,
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertIsRedirectedTo("/group/$groupSlug");
        $this->assertMailSentTo($email);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $group = $this->getGroupRepository()->findOneBySlug($groupSlug);
        $this->assertNotNull($group);
        $this->assertSame($email, $group->getAnimator()->getEmailAddress());
        $this->assertSame($groupName, $group->getName());
        $this->assertSame($groupSlug, $group->getSlug());
        $this->assertSame($groupDescription, $group->getDescription());
        $this->assertTrue($group->isPending());
    }

    public function testActorWithPendingGroupCannotCreateGroup(): void
    {
        $this->authenticateActor('marine@mobilisation-eu.localhost');

        $this->client->request('GET', '/group/create');
        $this->assertAccessDeniedResponse();

        $this->client->request('POST', '/group/create', [
            'name' => 'My new group',
            'description' => 'A very cool description.',
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertAccessDeniedResponse();
        $this->assertNull($this->getGroupRepository()->findOneBySlug('my-new-group'));
    }

    public function provideBadCreations(): iterable
    {
        yield [
            [
                'name' => null,
                'description' => null,
                'city' => null,
            ],
            [
                'group.name.not_blank',
                'group.description.not_blank',
                'common.city.invalid',
            ],
        ];

        // a confirmed group with this name already exists
        yield [
            [
                'name' => 'Ecology in Paris',
                'description' => 'Too short',
                'city' => CityFixtures::CITY_02_UUID,
            ],
            [
                'group.slug.not_unique',
                'group.description.min_length',
            ],
        ];

        // a confirmed group with this slug already exists
        yield [
            [
                'name' => 'Ecolôgy-în Pârïs ',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi posuere orci sed turpis lacinia vestibulum. Donec pulvinar augue quis ex aliquet consequat. Nullam ligula arcu, ornare id pellentesque eget, condimentum id risus. Nullam auctor ut diam non ullamcorper. Proin commodo dui vel enim accumsan, elementum tincidunt lectus venenatis.',
                'city' => CityFixtures::CITY_02_UUID,
            ],
            [
                'group.slug.not_unique',
                'group.description.max_length',
            ],
        ];

        // a pending group with this name already exists
        yield [
            [
                'name' => 'Culture in Paris',
                'description' => 'A very cool description.',
                'city' => CityFixtures::CITY_02_UUID,
            ],
            [
                'group.slug.not_unique',
            ],
        ];

        // a pending group with this slug already exists
        yield [
            [
                'name' => 'Cûltüré in-Pârïs-',
                'description' => 'A very cool description.',
                'city' => CityFixtures::CITY_02_UUID,
            ],
            [
                'group.slug.not_unique',
            ],
        ];

        // a refused group with this name already exists
        yield [
            [
                'name' => 'Development in Bois-Colombes',
                'description' => 'A very cool description.',
                'city' => CityFixtures::CITY_02_UUID,
            ],
            [
                'group.slug.not_unique',
            ],
        ];

        // a refused group with this slug already exists
        yield [
            [
                'name' => 'Dévelôpmént-in bôïs côlômbès ',
                'description' => 'A very cool description.',
                'city' => CityFixtures::CITY_02_UUID,
            ],
            [
                'group.slug.not_unique',
            ],
        ];
    }

    /**
     * @dataProvider provideBadCreations
     */
    public function testCreateFailure(array $fieldValues, array $errors): void
    {
        $this->authenticateActor('remi@mobilisation-eu.localhost');

        $this->client->request('GET', '/group/create');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('group_create.submit', $fieldValues);
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
    }

    public function provideActorCanCreateGroupFromHomepage(): iterable
    {
        // animator of a refused group
        yield [
            'remi@mobilisation-eu.localhost',
            'Rémi',
            'My new group',
            'my-new-group',
            'Description of my very new group.',
        ];

        // no relation with any group
        yield [
            'didier@mobilisation-eu.localhost',
            'Didier',
            'Best new group',
            'best-new-group',
            'Description of the group.',
        ];
    }

    /**
     * @dataProvider provideActorCanCreateGroupFromHomepage
     */
    public function testActorCanCreateGroupFromHomepage(
        string $email,
        string $firstName,
        string $groupName,
        string $groupSlug,
        string $groupDescription
    ): void {
        $this->authenticateActor($email);

        $this->client->request('GET', '/');
        $this->assertResponseSuccessFul();

        $this->client->clickLink('layout.header.cta.create_group');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('group_create.submit', [
            'name' => $groupName,
            'description' => $groupDescription,
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertIsRedirectedTo("/group/$groupSlug");
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'mail.group.created.subject',
            'body' => "@string@.contains('mail.group.created.body')",
        ]);

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertCount(1, $crawler->filter("h2:contains(\"$groupName\")"));
        $this->assertCount(1, $crawler->filter('.alert:contains("group.view.view.flash.pending")'));
        $this->assertCount(1, $crawler->filter("#group-description:contains(\"$groupDescription\")"));
        $this->assertEmpty($crawler->selectLink('layout.header.create_group'));
    }

    public function provideActorCanCreateGroup(): iterable
    {
        // animator of a confirmed group
        yield [
            'titouan@mobilisation-eu.localhost',
            'Titouan',
            'A cool group',
            'a-cool-group',
            'Description of a very cool group.',
        ];

        yield [
            'francis@mobilisation-eu.localhost',
            'Francis',
            'My new group',
            'my-new-group',
            'Description of the new group.',
        ];
    }

    /**
     * @dataProvider provideActorCanCreateGroup
     */
    public function testActorCanCreateGroup(
        string $email,
        string $firstName,
        string $groupName,
        string $groupSlug,
        string $groupDescription
    ): void {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/create');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('group_create.submit', [
            'name' => $groupName,
            'description' => $groupDescription,
            'city' => CityFixtures::CITY_02_UUID,
        ]);
        $this->assertIsRedirectedTo("/group/$groupSlug");
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'mail.group.created.subject',
            'body' => "@string@.contains('mail.group.created.body')",
        ]);

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertCount(1, $crawler->filter("h2:contains(\"$groupName\")"));
        $this->assertCount(1, $crawler->filter('.alert:contains("group.view.view.flash.pending")'));
        $this->assertCount(1, $crawler->filter("#group-description:contains(\"$groupDescription\")"));
        $this->assertEmpty($crawler->selectLink('layout.header.create_group'));
    }
}
