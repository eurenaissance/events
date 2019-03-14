<?php

namespace Test\App\Controller\Event;

use App\DataFixtures\CityFixtures;
use App\Tests\HttpTestCase;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @group functional
 */
class CreationControllerTest extends HttpTestCase
{
    public function provideChooseGroupUsers(): iterable
    {
        // No group available => redirect to home
        yield [
            'email' => 'remi@mobilisation-eu.localhost',
            'redirect' => '/',
            'groups' => [],
        ];

        // One group available => redirect to this group event creation
        yield [
            'email' => 'francis@mobilisation-eu.localhost',
            'redirect' => '/group/ecology-in-paris/event/create',
            'groups' => [],
        ];

        // No group available => chooser
        yield [
            'email' => 'titouan@mobilisation-eu.localhost',
            'redirect' => null,
            'groups' => ['Ecology in Clichy', 'Ecology in Paris'],
        ];
    }

    /**
     * @dataProvider provideChooseGroupUsers
     */
    public function testChooseGroup(string $email, ?string $expectedRedirect, array $expectedGroups): void
    {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', '/event/create/choose-group');

        if ($expectedRedirect) {
            $this->assertIsRedirectedTo($expectedRedirect);
        } else {
            $this->assertResponseSuccessful();

            $groups = $crawler->filter('.card__title')->each(function (Crawler $node) {
                return trim($node->text());
            });

            $this->assertSame($expectedGroups, $groups);
        }
    }

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
            'beginAt' => $beginAt = $this->createFormDateTime('+2 days'),
            'finishAt' => $this->createFormDateTime('+3 days'),
        ]);
        $this->assertIsRedirectedTo('/login');
        $this->assertNull($this->getEventRepository()->findOneBySlug(sprintf(
            '%s-%s-%s-my-new-event',
            $beginAt['date']['year'],
            str_pad($beginAt['date']['month'], 2, '0', STR_PAD_LEFT),
            str_pad($beginAt['date']['day'], 2, '0', STR_PAD_LEFT)
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
        $this->assertResponseSuccessful();

        $this->client->submitForm('event_create.submit', [
            'name' => $eventName,
            'description' => $eventDescription,
            'city' => CityFixtures::CITY_02_UUID,
            'beginAt' => $beginAt = $this->createFormDateTime($eventBeginAt),
            'finishAt' => $finishAt = $this->createFormDateTime($eventFinishAt),
        ]);

        $eventSlug = sprintf(
            '%s-%s-%s-%s',
            $beginAt['date']['year'],
            str_pad($beginAt['date']['month'], 2, '0', STR_PAD_LEFT),
            str_pad($beginAt['date']['day'], 2, '0', STR_PAD_LEFT),
            $eventSlug
        );
        $this->assertIsRedirectedTo("/event/$eventSlug");
        $this->assertMailSentTo($email);

        $this->client->followRedirect();
        $this->assertResponseSuccessful();

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
                $beginAt['date']['year'],
                str_pad($beginAt['date']['month'], 2, '0', STR_PAD_LEFT),
                str_pad($beginAt['date']['day'], 2, '0', STR_PAD_LEFT)
            ),
            $event->getBeginAt()->format('Y-m-d')
        );
        $this->assertSame(
            sprintf(
                '%s-%s-%s',
                $finishAt['date']['year'],
                str_pad($finishAt['date']['month'], 2, '0', STR_PAD_LEFT),
                str_pad($finishAt['date']['day'], 2, '0', STR_PAD_LEFT)
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
            'beginAt' => $beginAt = $this->createFormDateTime('+2 days'),
            'finishAt' => $this->createFormDateTime('+3 days'),
        ]);
        $this->assertAccessDeniedResponse();
        $this->assertNull($this->getEventRepository()->findOneBySlug(sprintf(
            '%s-%s-%s-my-new-event',
            $beginAt['date']['year'],
            str_pad($beginAt['date']['month'], 2, '0', STR_PAD_LEFT),
            str_pad($beginAt['date']['day'], 2, '0', STR_PAD_LEFT)
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
            ],
            [
                'event.name.not_blank',
                'event.description.not_blank',
                'common.city.invalid',
            ],
        ];

        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-clichy',
            [
                'name' => 'My new event',
                'description' => 'Description of the new event.',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => ['date' => ['year' => null, 'month' => 10, 'day' => 5]],
                'finishAt' => ['date' => ['year' => 2019, 'month' => 10, 'day' => 8]],
            ],
            [
                'common.date.invalid',
            ],
        ];

        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-clichy',
            [
                'name' => 'Event in Clichy',
                'description' => 'Description of the new event.',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => $beginAt = $this->createFormDateTime('+3 days'),
                'finishAt' => ['date' => ['year' => null, 'month' => 10, 'day' => 8]],
            ],
            [
                'event.slug.not_unique',
                'common.date.invalid',
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
        $this->assertResponseSuccessful();

        $this->client->submitForm('event_create.submit', $fieldValues);
        $this->assertResponseSuccessful();
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
            'ecology-in-clichy',
            [
                'name' => 'My new event about development',
                'description' => 'Description of my new event',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => $beginAt = $this->createFormDateTime('+2 days'),
                'finishAt' => $this->createFormDateTime('+3 days'),
            ],
            sprintf(
                '%s-%s-%s-my-new-event-about-development',
                $beginAt['date']['year'],
                str_pad($beginAt['date']['month'], 2, '0', STR_PAD_LEFT),
                str_pad($beginAt['date']['day'], 2, '0', STR_PAD_LEFT)
            ),
        ];

        yield [
            'nicolas@mobilisation-eu.localhost',
            'culture-in-cannes',
            [
                'name' => 'My new event about culture',
                'description' => 'Description of my new event',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => $beginAt = $this->createFormDateTime('+5 days'),
                'finishAt' => $this->createFormDateTime('+6 days'),
            ],
            sprintf(
                '%s-%s-%s-my-new-event-about-culture',
                $beginAt['date']['year'],
                str_pad($beginAt['date']['month'], 2, '0', STR_PAD_LEFT),
                str_pad($beginAt['date']['day'], 2, '0', STR_PAD_LEFT)
            ),
        ];
    }

    /**
     * @dataProvider provideAnimatorCanCreateEventFromGroup
     */
    public function testAnimatorCanCreateEventFromGroup(
        string $email,
        string $groupSlug,
        array $fieldValues,
        string $eventSlug
    ): void {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug");
        $this->assertResponseSuccessful();

        $this->client->clickLink('group_view.actions.organize_event');
        $this->assertResponseSuccessful();

        $this->client->submitForm('event_create.submit', $fieldValues);
        $this->assertIsRedirectedTo("/event/$eventSlug");
        $this->assertMailSent([
            'to' => $email,
            'subject' => 'mail.event.created.subject',
            'body' => "@string@.contains('mail.event.created.body')",
        ]);

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertCount(1, $crawler->filter('h2:contains("'.$fieldValues['name'].'")'));
        $this->assertCount(1, $crawler->filter('#event-description:contains("'.$fieldValues['description'].'")'));
    }

    public function provideAnimatorWithNotificationDisabledCanCreateEventFromGroup(): iterable
    {
        // animator of the group
        yield [
            'emmanuel@mobilisation-eu.localhost',
            'culture-in-mouscron',
            [
                'name' => 'My new event about development',
                'description' => 'Description of my new event',
                'city' => CityFixtures::CITY_02_UUID,
                'beginAt' => $beginAt = $this->createFormDateTime('+2 days'),
                'finishAt' => $this->createFormDateTime('+3 days'),
            ],
            sprintf(
                '%s-%s-%s-my-new-event-about-development',
                $beginAt['date']['year'],
                str_pad($beginAt['date']['month'], 2, '0', STR_PAD_LEFT),
                str_pad($beginAt['date']['day'], 2, '0', STR_PAD_LEFT)
            ),
        ];
    }

    /**
     * @dataProvider provideAnimatorWithNotificationDisabledCanCreateEventFromGroup
     */
    public function testAnimatorWithDisabledNotificationCanCreateEventFromGroup(
        string $email,
        string $groupSlug,
        array $fieldValues,
        string $eventSlug
    ): void {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug");
        $this->assertResponseSuccessful();

        $this->client->clickLink('group_view.actions.organize_event');
        $this->assertResponseSuccessful();

        $this->client->submitForm('event_create.submit', $fieldValues);
        $this->assertIsRedirectedTo("/event/$eventSlug");
        $this->assertNoMailSent();

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessful();
        $this->assertCount(1, $crawler->filter('h2:contains("'.$fieldValues['name'].'")'));
        $this->assertCount(1, $crawler->filter('#event-description:contains("'.$fieldValues['description'].'")'));
    }
}
