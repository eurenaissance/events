<?php

namespace Test\App\Controller\Group;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class ViewControllerTest extends HttpTestCase
{
    public function provideGroupsForAnonymous(): iterable
    {
        // refused groups
        yield ['development-in-bois-colombes'];
        yield ['development-in-paris'];
        yield ['development-in-lille'];
        // pending groups
        yield ['culture-in-paris'];
        // approved group
        yield ['ecology-in-clichy'];
        yield ['ecology-in-paris'];
        yield ['ecology-in-nantes'];
        yield ['ecology-in-nice'];
        yield ['culture-in-cannes'];
        yield ['culture-in-asnieres'];
    }

    /**
     * @dataProvider provideGroupsForAnonymous
     */
    public function testAnonymousCannotViewAnyGroup(string $slug): void
    {
        $this->client->request('GET', "/group/$slug");
        $this->assertIsRedirectedTo('/login');
    }

    public function provideActorsForRefusedGroup(): iterable
    {
        yield ['remi@mobilisation-eu.localhost']; // animator of the refused group
        yield ['titouan@mobilisation-eu.localhost']; // animator of another confirmed group
        yield ['marine@mobilisation-eu.localhost']; // animator of another pending group
        yield ['didier@mobilisation-eu.localhost']; // no relation with any group
        yield ['francis@mobilisation-eu.localhost'];
        yield ['jacques@mobilisation-eu.localhost'];
        yield ['nicolas@mobilisation-eu.localhost'];
    }

    /**
     * @dataProvider provideActorsForRefusedGroup
     */
    public function testNoOneCanViewRefusedGroup(string $email): void
    {
        $this->authenticateActor($email);

        $groupSlugs = [
            // group has been refused
            'development-in-bois-colombes',
            // group was approved then refused
            'development-in-lille',
        ];

        foreach ($groupSlugs as $groupSlug) {
            $this->client->request('GET', "/group/$groupSlug");
            $this->assertNotFoundResponse();
        }
    }

    public function provideActorsForPendingGroup(): iterable
    {
        yield ['remi@mobilisation-eu.localhost']; // animator of another refused group
        yield ['titouan@mobilisation-eu.localhost']; // animator of another confirmed group
        yield ['didier@mobilisation-eu.localhost']; // no relation with any group
        yield ['francis@mobilisation-eu.localhost'];
        yield ['jacques@mobilisation-eu.localhost'];
        yield ['nicolas@mobilisation-eu.localhost'];
    }

    /**
     * @dataProvider provideActorsForPendingGroup
     */
    public function testActorCannotViewPendingGroup(string $email): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', '/group/culture-in-paris');
        $this->assertAccessDeniedResponse();
    }

    public function testAnimatorCanViewHisPendingGroup(): void
    {
        $this->authenticateActor('marine@mobilisation-eu.localhost');

        $crawler = $this->client->request('GET', '/group/culture-in-paris');
        $this->assertResponseSuccessFul();
        $this->assertCount(1, $crawler->filter('h2:contains("Culture in Paris")'));
        $this->assertCount(1, $crawler->filter('.alert:contains("group.view.view.flash.pending")'));
    }

    public function provideActorsForConfirmedGroup(): iterable
    {
        // animator of another refused group
        yield ['remi@mobilisation-eu.localhost', 'ecology-in-paris'];

        // animator of another confirmed group
        yield ['titouan@mobilisation-eu.localhost', 'ecology-in-paris'];

        // animator of the confirmed group
        yield ['marine@mobilisation-eu.localhost', 'ecology-in-paris'];

        // no relation with the group
        yield ['francis@mobilisation-eu.localhost', 'ecology-in-clichy'];
        yield ['jacques@mobilisation-eu.localhost', 'culture-in-asnieres'];
        yield ['manon@mobilisation-eu.localhost', 'ecology-in-nice'];

        // no relation with any group
        yield ['didier@mobilisation-eu.localhost', 'ecology-in-paris'];
    }

    /**
     * @dataProvider provideActorsForConfirmedGroup
     */
    public function testActorCanViewConfirmedGroup(string $email, string $groupSlug): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug");
        $this->assertResponseSuccessFul();
    }

    public function provideActorsCanSeeGroupInformation(): iterable
    {
        // follower of the group
        yield [
            'remi@mobilisation-eu.localhost',
            'ecology-in-paris',
            'Ecology in Paris',
            'Paris, France',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            [
                'Marine Boudeau',
                'Titouan Galopin',
                'Francis Brioul',
            ],
            [
                'Event in Bois-Colombes',
                'Event in Clichy',
                'First event in Paris',
                'Second event in Paris',
            ],
            [
                'Second finished event in Paris',
                'First finished event in Paris',
            ],
            [
                '/unfollow' => 'Unfollow',
                '/follow' => false,
                '/members' => false,
                '/event/create' => false,
            ],
        ];

        // co-animator of the group
        yield [
            'titouan@mobilisation-eu.localhost',
            'ecology-in-paris',
            'Ecology in Paris',
            'Paris, France',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            [
                'Marine Boudeau',
                'Titouan Galopin',
                'Francis Brioul',
            ],
            [
                'Event in Bois-Colombes',
                'Event in Clichy',
                'First event in Paris',
                'Second event in Paris',
            ],
            [
                'Second finished event in Paris',
                'First finished event in Paris',
            ],
            [
                '/unfollow' => false,
                '/follow' => false,
                '/members' => 'View members',
                '/event/create' => 'Create an event',
            ],
        ];

        // animator of the group
        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-paris',
            'Ecology in Paris',
            'Paris, France',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            [
                'Marine Boudeau',
                'Titouan Galopin',
                'Francis Brioul',
            ],
            [
                'Event in Bois-Colombes',
                'Event in Clichy',
                'First event in Paris',
                'Second event in Paris',
            ],
            [
                'Second finished event in Paris',
                'First finished event in Paris',
            ],
            [
                '/unfollow' => false,
                '/follow' => false,
                '/members' => 'View members',
                '/event/create' => 'Create an event',
            ],
        ];

        // no relation with the group
        yield [
            'francis@mobilisation-eu.localhost',
            'ecology-in-clichy',
            'Ecology in Clichy',
            'Clichy, France',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            [
                'Titouan Galopin',
                'Marine Boudeau',
            ],
            [],
            ['Event ecology in Clichy'],
            [
                '/unfollow' => false,
                '/follow' => 'Follow',
                '/members' => false,
                '/event/create' => false,
            ],
        ];

        yield [
            'jacques@mobilisation-eu.localhost',
            'culture-in-asnieres',
            'Culture in Asnieres',
            'Asnières-sur-Seine, France',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ['Nicolas Cage'],
            ['Event in Asnieres'],
            [],
            [
                '/unfollow' => false,
                '/follow' => 'Follow',
                '/members' => false,
                '/event/create' => false,
            ],
        ];

        yield [
            'manon@mobilisation-eu.localhost',
            'ecology-in-nice',
            'Ecology in Nice',
            'Nice, France',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ['Jacques Picard'],
            ['Event in Nice'],
            [],
            [
                '/unfollow' => false,
                '/follow' => 'Follow',
                '/members' => false,
                '/event/create' => false,
            ],
        ];

        // no relation with any group
        yield [
            'didier@mobilisation-eu.localhost',
            'ecology-in-paris',
            'Ecology in Paris',
            'Paris, France',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            [
                'Marine Boudeau',
                'Titouan Galopin',
                'Francis Brioul',
            ],
            [
                'Event in Bois-Colombes',
                'Event in Clichy',
                'First event in Paris',
                'Second event in Paris',
            ],
            [
                'Second finished event in Paris',
                'First finished event in Paris',
            ],
            [
                '/unfollow' => false,
                '/follow' => 'Follow',
                '/members' => false,
                '/event/create' => false,
            ],
        ];
    }

    /**
     * @dataProvider provideActorsCanSeeGroupInformation
     */
    public function testActorsCanSeeGroupInformation(
        string $email,
        string $groupSlug,
        string $groupName,
        string $groupCity,
        string $groupDescription,
        array $animatorNames,
        array $upcomingEventNames,
        array $finishedEventNames,
        array $actions
    ): void {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', "/group/$groupSlug");
        $this->assertResponseSuccessFul();

        $this->assertCount(1, $crawler->filter("h2:contains(\"$groupName\")"));
        $this->assertCount(1, $crawler->filter("#group-description:contains(\"$groupDescription\")"));
        $this->assertCount(1, $crawler->filter("#group-address:contains(\"$groupCity\")"));

        $animators = $crawler->filter('#animators')->children();
        $this->assertCount(count($animatorNames), $animators);

        for ($i = 0; $i < count($animatorNames); ++$i) {
            $this->assertSame($animatorNames[$i], trim($animators->eq($i)->text()));
        }

        $upcomingEvents = $crawler->filter('#upcoming-events .card--event');
        $this->assertCount(count($upcomingEventNames), $upcomingEvents);

        for ($i = 0; $i < count($upcomingEventNames); ++$i) {
            $this->assertSame($upcomingEventNames[$i], trim($upcomingEvents->eq($i)->filter('h4')->text()));
        }

        $finishedEvents = $crawler->filter('#finished-events .card--event');
        $this->assertCount(count($finishedEventNames), $finishedEvents);

        for ($i = 0; $i < count($finishedEventNames); ++$i) {
            $this->assertSame($finishedEventNames[$i], trim($finishedEvents->eq($i)->filter('h4')->text()));
        }

        foreach ($actions as $target => $label) {
            $uri = '/group/'.$groupSlug.$target;
            $actualLinks = $crawler->filter("a[href=\"$uri\"]");

            if ($label) {
                $this->assertCount(1, $actualLinks);
                $this->assertSame($label, trim($actualLinks->eq(0)->text()));
            } else {
                $this->assertEmpty($actualLinks);
            }
        }
    }
}
