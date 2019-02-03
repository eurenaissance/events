<?php

namespace Test\App\Controller;

use App\Tests\HttpTestCase;

/**
 * @group functional
 */
class MembersControllerTest extends HttpTestCase
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
    public function testAnonymousCannotViewAnyGroupMembers(string $slug): void
    {
        $this->client->request('GET', "/group/$slug/members");
        $this->assertIsRedirectedTo('/login');
    }

    public function provideActorsForRefusedAndPendingGroup(): iterable
    {
        yield ['marine@mobilisation-eu.localhost'];
        yield ['titouan@mobilisation-eu.localhost'];
        yield ['didier@mobilisation-eu.localhost'];
        yield ['francis@mobilisation-eu.localhost'];
        yield ['jacques@mobilisation-eu.localhost'];
        yield ['nicolas@mobilisation-eu.localhost'];
        // animator of the refused group
        yield ['remi@mobilisation-eu.localhost'];
        // animator of the pending group
        yield ['marine@mobilisation-eu.localhost'];
        // animator of the approved and refused group
    }

    /**
     * @dataProvider provideActorsForRefusedAndPendingGroup
     */
    public function testNoOneCanViewMembersOfRefusedOrPendingGroup(string $email): void
    {
        $this->authenticateActor($email);

        $groupSlugs = [
            // group has been refused
            'development-in-bois-colombes',
            // group was approved then refused
            'development-in-lille',
            // group is pending
            'culture-in-paris',
        ];

        foreach ($groupSlugs as $groupSlug) {
            $this->client->request('GET', "/group/$groupSlug/members");
            $this->assertNotFoundResponse();
        }
    }

    public function provideActorsForConfirmedGroup(): iterable
    {
        // follower of the group
        yield ['remi@mobilisation-eu.localhost', 'ecology-in-paris'];
        yield ['remi@mobilisation-eu.localhost', 'culture-in-asnieres'];
        yield ['nicolas@mobilisation-eu.localhost', 'ecology-in-nice'];
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
    public function testActorCannotViewMembersOfConfirmedGroup(string $email, string $groupSlug): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug/members");
        $this->assertAccessDeniedResponse();
    }

    public function provideAnimatorCanViewMembersOfGroup(): iterable
    {
        // animator of the group
        yield ['marine@mobilisation-eu.localhost', 'ecology-in-paris'];
        yield ['titouan@mobilisation-eu.localhost', 'ecology-in-clichy'];
        yield ['nicolas@mobilisation-eu.localhost', 'culture-in-asnieres'];
        yield ['manon@mobilisation-eu.localhost', 'ecology-in-nantes'];
        // co-animator of the group
        yield ['titouan@mobilisation-eu.localhost', 'ecology-in-paris'];
        yield ['francis@mobilisation-eu.localhost', 'ecology-in-paris'];
        yield ['marine@mobilisation-eu.localhost', 'ecology-in-clichy'];
    }

    /**
     * @dataProvider provideAnimatorCanViewMembersOfGroup
     */
    public function testAnimatorCanViewMembersOfGroup(string $email, string $groupSlug): void
    {
        $this->authenticateActor($email);

        $this->client->request('GET', "/group/$groupSlug/members");
        $this->assertResponseSuccessFul();
    }

    public function provideActorsCanSeeMembersFromView(): iterable
    {
        // animator of the group
        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-paris',
            [
                ['Marine', 'Boudeau', 'marine@mobilisation-eu.localhost'],
                ['Titouan', 'Galopin', 'titouan@mobilisation-eu.localhost'],
                ['Francis', 'Brioul', 'francis@mobilisation-eu.localhost'],
            ],
            [
                ['Rémi', 'Gardien', 'titouan@mobilisation-eu.localhost'],
            ],
            true,
        ];

        // co-animator of the group
        yield [
            'titouan@mobilisation-eu.localhost',
            'ecology-in-paris',
            [
                ['Marine', 'Boudeau', 'marine@mobilisation-eu.localhost'],
                ['Titouan', 'Galopin', 'titouan@mobilisation-eu.localhost'],
                ['Francis', 'Brioul', 'francis@mobilisation-eu.localhost'],
            ],
            [
                ['Rémi', 'Gardien', 'remi@mobilisation-eu.localhost'],
            ],
            false,
        ];

        yield [
            'nicolas@mobilisation-eu.localhost',
            'culture-in-asnieres',
            [
                ['Nicolas', 'Cage', 'nicolas@mobilisation-eu.localhost'],
            ],
            [
                ['Rémi', 'Gardien', 'remi@mobilisation-eu.localhost'],
                ['Marine', 'Boudeau', 'marine@mobilisation-eu.localhost'],
            ],
            true,
        ];

        yield [
            'titouan@mobilisation-eu.localhost',
            'ecology-in-clichy',
            [
                ['Titouan', 'Galopin', 'titouan@mobilisation-eu.localhost'],
                ['Marine', 'Boudeau', 'marine@mobilisation-eu.localhost'],
            ],
            [
                ['Rémi', 'Gardien', 'remi@mobilisation-eu.localhost'],
            ],
            true,
        ];

        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-clichy',
            [
                ['Titouan', 'Galopin', 'titouan@mobilisation-eu.localhost'],
                ['Marine', 'Boudeau', 'marine@mobilisation-eu.localhost'],
            ],
            [
                ['Rémi', 'Gardien', 'remi@mobilisation-eu.localhost'],
            ],
            false,
        ];

        yield [
            'manon@mobilisation-eu.localhost',
            'ecology-in-nantes',
            [
                ['Manon', 'Mercier', 'manon@mobilisation-eu.localhost'],
            ],
            [],
            true,
        ];
    }

    /**
     * @dataProvider provideActorsCanSeeMembersFromView
     */
    public function testActorsCanSeeMembersFromView(
        string $email,
        string $groupSlug,
        array $animatorsInformation,
        array $followersInformation,
        bool $canSeeActions
    ): void {
        $this->authenticateActor($email);

        $crawler = $this->client->request('GET', "/group/$groupSlug");
        $this->assertResponseSuccessFul();

        $this->assertCount(1, $linkCrawler = $crawler->selectLink('View members'));

        $link = $linkCrawler->link();
        $this->assertSame($this->getAbsoluteUrl("/group/$groupSlug/members"), $link->getUri());

        $crawler = $this->client->click($link);
        $this->assertResponseSuccessFul();

        $coAnimators = $crawler->filter('#co-animators tbody tr');
        $this->assertCount(count($animatorsInformation), $coAnimators);

        for ($i = 0; $i < count($animatorsInformation); ++$i) {
            $expectedCoAnimator = $animatorsInformation[$i];
            $expectedFirstName = $expectedCoAnimator[0];
            $expectedLastName = $expectedCoAnimator[1];

            $row = $coAnimators->eq($i);
            $this->assertSame($expectedFirstName, trim($row->filter('td')->eq(0)->text()));
            $this->assertSame($expectedLastName, trim($row->filter('td')->eq(1)->text()));

            $linkCrawler = $row->selectLink('Demote');
            // first line is the animator, so there is no link to demote.
            if ($canSeeActions && 0 !== $i) {
                $this->assertCount(1, $linkCrawler);
                $this->assertMatchesPattern(
                    $this->getAbsoluteUrl("/group/$groupSlug/demote/@uuid@"),
                    $linkCrawler->link()->getUri()
                );
            } else {
                $this->assertCount(0, $linkCrawler);
            }
        }

        $followers = $crawler->filter('#followers tbody tr');
        $this->assertCount(count($followersInformation), $followers);

        for ($i = 0; $i < count($followersInformation); ++$i) {
            $expectedFollower = $followersInformation[$i];
            $expectedFirstName = $expectedFollower[0];
            $expectedLastName = $expectedFollower[1];

            $row = $followers->eq($i);
            $this->assertSame($expectedFirstName, trim($row->filter('td')->eq(0)->text()));
            $this->assertSame($expectedLastName, trim($row->filter('td')->eq(1)->text()));

            $linkCrawler = $row->selectLink('Promote');
            if ($canSeeActions) {
                $this->assertCount(1, $linkCrawler);
                $this->assertMatchesPattern(
                    $this->getAbsoluteUrl("/group/$groupSlug/promote/@uuid@"),
                    $linkCrawler->link()->getUri()
                );
            } else {
                $this->assertCount(0, $linkCrawler);
            }
        }
    }
}
