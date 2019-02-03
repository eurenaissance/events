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
                'beginAt' => [],
                'finishAt' => [],
            ],
            [
                'Please enter an event name.',
                'Please provide a short description.',
                'This city is not valid.',
                'Please enter a start date.',
                'Please enter a finish date.',
            ],
        ];

        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-clichy',
            [
                'name' => 'My new event',
                'description' => 'Description of the new event.',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => ['year' => null, 'month' => 10, 'day' => 5],
                'finishAt' => ['year' => 2019, 'month' => 10, 'day' => 8],
            ],
            [
                'This date is not valid.',
            ],
        ];

        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-clichy',
            [
                'name' => 'Event in Clichy',
                'description' => 'Description of the new event.',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => $beginAt = $this->createFormDate('+3 days'),
                'finishAt' => ['year' => null, 'month' => 10, 'day' => 8],
            ],
            [
                sprintf(
                    'An event with a URL &quot;&quot;%s-%s-%s-event-in-clichy&quot;&quot; already exists.',
                    $beginAt['year'],
                    str_pad($beginAt['month'], 2, '0', STR_PAD_LEFT),
                    str_pad($beginAt['day'], 2, '0', STR_PAD_LEFT)
                ),
                'This date is not valid.',
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

    public function provideAnimatorCanCreateEventFromGroup(): iterable
    {
        // animator of the group
        yield [
            'titouan@mobilisation-eu.localhost',
            'Titouan',
            'ecology-in-clichy',
            'Ecology in Clichy',
            [
                'name' => 'My new event about development',
                'description' => 'Description of my new event',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => $beginAt = $this->createFormDate('+2 days'),
                'finishAt' => $this->createFormDate('+3 days'),
            ],
            sprintf(
                '%s-%s-%s-my-new-event-about-development',
                $beginAt['year'],
                str_pad($beginAt['month'], 2, '0', STR_PAD_LEFT),
                str_pad($beginAt['day'], 2, '0', STR_PAD_LEFT)
            ),
        ];

        yield [
            'nicolas@mobilisation-eu.localhost',
            'Nicolas',
            'culture-in-cannes',
            'Culture in Cannes',
            [
                'name' => 'My new event about culture',
                'description' => 'Description of my new event',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => $beginAt = $this->createFormDate('+5 days'),
                'finishAt' => $this->createFormDate('+6 days'),
            ],
            sprintf(
                '%s-%s-%s-my-new-event-about-culture',
                $beginAt['year'],
                str_pad($beginAt['month'], 2, '0', STR_PAD_LEFT),
                str_pad($beginAt['day'], 2, '0', STR_PAD_LEFT)
            ),
        ];
    }

    /**
     * @dataProvider provideAnimatorCanCreateEventFromGroup
     */
    public function testAnimatorCanCreateEventFromGroup(
        string $email,
        string $firstName,
        string $groupSlug,
        string $groupName,
        array $fieldValues,
        string $eventSlug
    ): void {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug");
        $this->assertResponseSuccessFul();

        $this->client->clickLink('Create an event');
        $this->assertResponseSuccessFul();

        $this->client->submitForm('Create', $fieldValues);
        $this->assertIsRedirectedTo("/event/$eventSlug");
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'Your event "'.$fieldValues['name'].'" has been created.',
            'body' => "@string@
                        .contains('Hello $firstName!')
                        .contains('Your event \"".$fieldValues['name']."\" in the group \"$groupName\" has been created.')",
        ]);

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertCount(1, $crawler->filter('h1:contains("'.$fieldValues['name'].'")'));
        $this->assertCount(1, $crawler->filter('#event-description:contains("'.$fieldValues['description'].'")'));
    }
}
