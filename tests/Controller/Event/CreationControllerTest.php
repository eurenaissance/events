<?php

namespace Test\App\Controller\Event;

use App\DataFixtures\CityFixtures;
use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class CreationControllerTest extends HttpTestCase
{
    public function provideGroupsForAnonymous(): iterable
    {
        yield ['ecology-in-paris'];
        yield ['ecology-in-clichy'];
        yield ['ecology-in-nice'];
        yield ['culture-in-cannes'];
        yield ['culture-in-asnieres'];
    }

    /**
     * @dataProvider provideGroupsForAnonymous
     */
    public function testAnonymousCannotCreateEvent(string $groupSlug): void
    {
        $this->client->request('GET', "/group/$groupSlug/event/create");
        $this->assertIsRedirectedTo('/login');

        $this->client->request('POST', "/group/$groupSlug/event/create", [
            'name' => 'My new event',
            'description' => 'Description of my new event',
            'city' => CityFixtures::CITY_02_UUID,
            'beginAt' => $beginAt = $this->createFormDate('+2 days'),
            'finishAt' => $this->createFormDate('+3 days'),
        ]);
        $this->assertIsRedirectedTo('/login');
        $this->assertNull($this->getEventRepository()->findOneBySlug(sprintf(
            '%s-%s-%s-my-new-event',
            $beginAt['year'],
            str_pad($beginAt['month'], 2, '0', STR_PAD_LEFT),
            str_pad($beginAt['day'], 2, '0', STR_PAD_LEFT)
        )));
    }

    public function provideActorsForCreateSuccess(): iterable
    {
        // animator of a refused group
        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-paris',
            'My new event',
            'my-new-event',
            'Description of my very new event.',
            '+2 days',
            '+3 days',
        ];

        // animator of a confirmed group
        yield [
            'titouan@mobilisation-eu.localhost',
            'ecology-in-clichy',
            'A cool event',
            'a-cool-event',
            'Description of a very cool event.',
            '+2 days',
            '+4 days',
        ];

        yield [
            'jacques@mobilisation-eu.localhost',
            'ecology-in-nice',
            'My new event',
            'my-new-event',
            'Description of the new event.',
            '+1 week',
            '+3 weeks',
        ];

        yield [
            'nicolas@mobilisation-eu.localhost',
            'culture-in-cannes',
            'My new event',
            'my-new-event',
            'Description of the new event.',
            '+5 days',
            '+8 days',
        ];
    }

    /**
     * @dataProvider provideActorsForCreateSuccess
     */
    public function testCreateSuccess(
        string $email,
        string $groupSlug,
        string $eventName,
        string $eventSlug,
        string $eventDescription,
        string $eventBeginAt,
        string $eventFinishAt
    ): void {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug/event/create");
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Create', [
            'name' => $eventName,
            'description' => $eventDescription,
            'city' => CityFixtures::CITY_02_UUID,
            'beginAt' => $beginAt = $this->createFormDate($eventBeginAt),
            'finishAt' => $finishAt = $this->createFormDate($eventFinishAt),
        ]);

        $eventSlug = sprintf(
            '%s-%s-%s-%s',
            $beginAt['year'],
            str_pad($beginAt['month'], 2, '0', STR_PAD_LEFT),
            str_pad($beginAt['day'], 2, '0', STR_PAD_LEFT),
            $eventSlug
        );
        $this->assertIsRedirectedTo("/event/$eventSlug");
        $this->assertMailSentTo($email);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();

        $event = $this->getEventRepository()->findOneBySlug($eventSlug);
        $this->assertNotNull($event);
        $this->assertSame($email, $event->getCreator()->getEmailAddress());
        $this->assertSame($groupSlug, $event->getGroup()->getSlug());
        $this->assertSame($eventName, $event->getName());
        $this->assertSame($eventSlug, $event->getSlug());
        $this->assertSame($eventDescription, $event->getDescription());
        $this->assertSame(
            sprintf(
                '%s-%s-%s',
                $beginAt['year'],
                str_pad($beginAt['month'], 2, '0', STR_PAD_LEFT),
                str_pad($beginAt['day'], 2, '0', STR_PAD_LEFT)
            ),
            $event->getBeginAt()->format('Y-m-d')
        );
        $this->assertSame(
            sprintf(
                '%s-%s-%s',
                $finishAt['year'],
                str_pad($finishAt['month'], 2, '0', STR_PAD_LEFT),
                str_pad($finishAt['day'], 2, '0', STR_PAD_LEFT)
            ),
            $event->getFinishAt()->format('Y-m-d')
        );
    }

    public function provideActorCannotCreateEvent(): iterable
    {
        yield ['remi@mobilisation-eu.localhost', 'ecology-in-paris'];
        yield ['remi@mobilisation-eu.localhost', 'ecology-in-clichy'];
        yield ['remi@mobilisation-eu.localhost', 'ecology-in-nice'];
        yield ['nicolas@mobilisation-eu.localhost', 'ecology-in-paris'];
        yield ['nicolas@mobilisation-eu.localhost', 'ecology-in-nantes'];
    }

    /**
     * @dataProvider provideActorCannotCreateEvent
     */
    public function testActorCannotCreateEvent(string $email, string $groupSlug): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug/event/create");
        $this->assertAccessDeniedResponse();

        $this->client->request('POST', "/group/$groupSlug/event/create", [
            'name' => 'My new event',
            'description' => 'Description of my new event',
            'city' => CityFixtures::CITY_02_UUID,
            'beginAt' => $beginAt = $this->createFormDate('+2 days'),
            'finishAt' => $this->createFormDate('+3 days'),
        ]);
        $this->assertAccessDeniedResponse();
        $this->assertNull($this->getEventRepository()->findOneBySlug(sprintf(
            '%s-%s-%s-my-new-event',
            $beginAt['year'],
            str_pad($beginAt['month'], 2, '0', STR_PAD_LEFT),
            str_pad($beginAt['day'], 2, '0', STR_PAD_LEFT)
        )));
    }

    public function provideBadCreations(): iterable
    {
        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-clichy',
            [
                'name' => null,
                'description' => null,
                'city' => null,
                'beginAt' => $this->createFormDate('+2 days'),
                'finishAt' => $this->createFormDate('+3 days'),
            ],
            [
                'Please enter an event name.',
                'Please provide a short description.',
                'This city is not valid.',
            ],
        ];
    }

    /**
     * @dataProvider provideBadCreations
     */
    public function testCreateFailure(string $email, string $groupSlug, array $fieldValues, array $errors): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug/event/create");
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Create', $fieldValues);
        $this->assertResponseSuccessFul();
        $this->assertResponseContains($errors);
        $this->assertNull($this->getEventRepository()->findOneBy([
            'creator' => $this->getActorRepository()->findOneByEmail($email),
            'group' => $this->getGroupRepository()->findOneBySlug($groupSlug),
            'name' => $fieldValues['name'],
        ]));
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

        // animator of a confirmed group
        yield [
            'titouan@mobilisation-eu.localhost',
            'Titouan',
            'A cool group',
            'a-cool-group',
            'Description of a very cool group.',
        ];

        // no relation with any group
        yield [
            'didier@mobilisation-eu.localhost',
            'Didier',
            'Best new group',
            'best-new-group',
            'Description of the group.',
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

        $this->client->clickLink('Create a group');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Create', [
            'name' => $groupName,
            'description' => $groupDescription,
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

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertCount(1, $crawler->filter("h1:contains(\"$groupName\")"));
        $this->assertCount(1, $crawler->filter('.alert:contains("Your group is waiting for admin approval.")'));
        $this->assertCount(1, $crawler->filter("#group-description:contains(\"$groupDescription\")"));
        $this->assertEmpty($crawler->selectLink('Create a group'));
    }
}
