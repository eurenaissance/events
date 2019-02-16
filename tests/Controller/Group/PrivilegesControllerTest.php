<?php

namespace Test\App\Controller\Group;

use App\Tests\HttpTestCase;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @group functional
 */
class AnimatorControllerTest extends HttpTestCase
{
    public function provideAnimatorCanPromoteFollowers(): iterable
    {
        yield [
            'nicolas@mobilisation-eu.localhost',
            'culture-in-asnieres',
            '472508fa-4e4d-4330-8fda-5fefc92b1a8a',
            'remi@mobilisation-eu.localhost',
        ];

        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-paris',
            '472508fa-4e4d-4330-8fda-5fefc92b1a8a',
            'remi@mobilisation-eu.localhost',
        ];

        yield [
            'jacques@mobilisation-eu.localhost',
            'ecology-in-nice',
            '2a9051e9-7cea-460f-a714-052079d4aa2b',
            'nicolas@mobilisation-eu.localhost',
        ];

        yield [
            'titouan@mobilisation-eu.localhost',
            'ecology-in-clichy',
            '472508fa-4e4d-4330-8fda-5fefc92b1a8a',
            'remi@mobilisation-eu.localhost',
        ];
    }

    /**
     * @dataProvider provideAnimatorCanPromoteFollowers
     */
    public function testAnimatorCanPromoteFollower(
        string $animatorEmail,
        string $groupSlug,
        string $followerUuid,
        string $followerEmail
    ): void {
        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);

        $this->authenticateActor($animatorEmail);

        $this->client->request('GET', "/group/$groupSlug/promote/$followerUuid");
        $this->assertIsRedirectedTo("/group/$groupSlug/members");
        $this->assertMailSentTo($followerEmail);

        $this->assertActorIsCoAnimatorOfGroup($followerUuid, $groupSlug);
    }

    public function provideAnimatorCanPromoteFollowerFromView(): iterable
    {
        yield [
            'nicolas@mobilisation-eu.localhost',
            'culture-in-asnieres',
            'Culture in Asnieres',
            '472508fa-4e4d-4330-8fda-5fefc92b1a8a',
            'remi@mobilisation-eu.localhost',
            'Rémi',
        ];

        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-paris',
            'Ecology in Paris',
            '472508fa-4e4d-4330-8fda-5fefc92b1a8a',
            'remi@mobilisation-eu.localhost',
            'Rémi',
        ];

        yield [
            'jacques@mobilisation-eu.localhost',
            'ecology-in-nice',
            'Ecology in Nice',
            '2a9051e9-7cea-460f-a714-052079d4aa2b',
            'nicolas@mobilisation-eu.localhost',
            'Nicolas',
        ];

        yield [
            'titouan@mobilisation-eu.localhost',
            'ecology-in-clichy',
            'Ecology in Clichy',
            '472508fa-4e4d-4330-8fda-5fefc92b1a8a',
            'remi@mobilisation-eu.localhost',
            'Rémi',
        ];
    }

    /**
     * @dataProvider provideAnimatorCanPromoteFollowerFromView
     */
    public function testAnimatorCanPromoteFollowerFromView(
        string $animatorEmail,
        string $groupSlug,
        string $groupName,
        string $followerUuid,
        string $followerEmail,
        string $followerName
    ): void {
        $this->authenticateActor($animatorEmail);

        $crawler = $this->client->request('GET', "/group/$groupSlug/members");
        $this->assertResponseSuccessFul();

        $this->assertCount(0, $crawler->filter("#co-animators tr:contains(\"$followerEmail\")"));
        $this->assertCount(1, $followerRow = $crawler->filter("#followers tr:contains(\"$followerEmail\")"));
        $this->assertCount(1, $linkCrawler = $followerRow->selectLink('Promote'));

        $link = $linkCrawler->link();
        $this->assertSame($this->getAbsoluteUrl("/group/$groupSlug/promote/$followerUuid"), $link->getUri());

        $this->client->click($link);
        $this->assertIsRedirectedTo("/group/$groupSlug/members");
        $this->assertMailSent([
            'to' => $followerEmail,
            'subject' => "You have been promoted to co-animator in the group \"$groupName\"!",
            'body' => "@string@
                        .contains('Hello $followerName!')
                        .contains('You have been promoted to co-animator')",
        ]);

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertCount(1, $crawler->filter('.alert:contains("group.animator.promote.flash.success")'));
        $this->assertCount(1, $crawler->filter("#co-animators tr:contains(\"$followerEmail\")"));
        $this->assertCount(0, $crawler->filter("#followers tr:contains(\"$followerEmail\")"));
    }

    public function provideActorCannotPromoteIfGroupIsNotApproved(): iterable
    {
        // animator of refused group
        yield ['thomas@mobilisation-eu.localhost', 'development-in-lille', '2a9051e9-7cea-460f-a714-052079d4aa2b'];
        // co-animator of the group
        yield ['remi@mobilisation-eu.localhost', 'development-in-lille', '2a9051e9-7cea-460f-a714-052079d4aa2b'];
        // follower of the group
        yield ['nicolas@mobilisation-eu.localhost', 'development-in-lille', '2a9051e9-7cea-460f-a714-052079d4aa2b'];
        // no relation with the group
        yield ['manon@mobilisation-eu.localhost', 'development-in-lille', '2a9051e9-7cea-460f-a714-052079d4aa2b'];
    }

    /**
     * @dataProvider provideActorCannotPromoteIfGroupIsNotApproved
     */
    public function testActorCannotPromoteIfGroupIsNotApproved(
        string $actorEmail,
        string $groupSlug,
        string $followerUuid
    ): void {
        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/promote/$followerUuid");
        $this->assertNotFoundResponse();
        $this->assertNoMailSent();

        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);
    }

    public function provideActorCannotPromoteOrDemoteIfGroupIsPending(): iterable
    {
        // animator of the pending group
        yield ['marine@mobilisation-eu.localhost', 'culture-in-paris', '2a9051e9-7cea-460f-a714-052079d4aa2b'];
        // no relation with the pending group
        yield ['titouan@mobilisation-eu.localhost', 'culture-in-paris', '2a9051e9-7cea-460f-a714-052079d4aa2b'];
        yield ['remi@mobilisation-eu.localhost', 'culture-in-paris', '2a9051e9-7cea-460f-a714-052079d4aa2b'];
    }

    /**
     * @dataProvider provideActorCannotPromoteOrDemoteIfGroupIsPending
     */
    public function testActorCannotPromoteIfGroupIsPending(
        string $actorEmail,
        string $groupSlug,
        string $actorUuid
    ): void {
        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/promote/$actorUuid");
        $this->assertNotFoundResponse();
        $this->assertNoMailSent();
    }

    /**
     * @dataProvider provideActorCannotPromoteOrDemoteIfGroupIsPending
     */
    public function testActorCannotDemoteIfGroupIsPending(
        string $actorEmail,
        string $groupSlug,
        string $actorUuid
    ): void {
        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/demote/$actorUuid");
        $this->assertNotFoundResponse();
        $this->assertNoMailSent();
    }

    public function provideAnonymousCannotPromoteFollowers(): iterable
    {
        yield ['ecology-in-paris', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        yield ['ecology-in-clichy', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        yield ['culture-in-asnieres', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
    }

    /**
     * @dataProvider provideAnonymousCannotPromoteFollowers
     */
    public function testAnonymousCannotPromoteFollower(string $groupSlug, string $followerUuid): void
    {
        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);

        $this->client->request('GET', "/group/$groupSlug/promote/$followerUuid");
        $this->assertIsRedirectedTo('/login');
        $this->assertNoMailSent();

        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);
    }

    public function provideActorCannotPromoteFollowers(): iterable
    {
        // co-animator of the group
        yield ['titouan@mobilisation-eu.localhost', 'ecology-in-paris', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        // follower of the group
        yield ['remi@mobilisation-eu.localhost', 'ecology-in-paris', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        // no relation with the group
        yield ['nicolas@mobilisation-eu.localhost', 'ecology-in-paris', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
    }

    /**
     * @dataProvider provideActorCannotPromoteFollowers
     */
    public function testActorCannotPromoteFollower(string $actorEmail, string $groupSlug, string $followerUuid): void
    {
        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/promote/$followerUuid");
        $this->assertAccessDeniedResponse();
        $this->assertNoMailSent();

        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);
    }

    public function provideAnimatorCanDemoteCoAnimators(): iterable
    {
        yield ['marine@mobilisation-eu.localhost', 'ecology-in-paris', '7ba7b43a-4a65-4862-b49a-91776043575b'];
        yield ['marine@mobilisation-eu.localhost', 'ecology-in-paris', '9b1f4321-8935-4ab5-b392-1e6f6913ace9'];
        yield ['titouan@mobilisation-eu.localhost', 'ecology-in-clichy', 'b4e514ac-5ccb-4687-aed1-14d3678b5491'];
    }

    /**
     * @dataProvider provideAnimatorCanDemoteCoAnimators
     */
    public function testAnimatorCanDemoteCoAnimator(
        string $animatorEmail,
        string $groupSlug,
        string $coAnimatorUuid
    ): void {
        $this->assertActorIsCoAnimatorOfGroup($coAnimatorUuid, $groupSlug);

        $this->authenticateActor($animatorEmail);

        $this->client->request('GET', "/group/$groupSlug/demote/$coAnimatorUuid");
        $this->assertIsRedirectedTo("/group/$groupSlug/members");
        $this->assertNoMailSent();

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('group.animator.demote.flash.success');

        $this->assertActorIsFollowerOfGroup($coAnimatorUuid, $groupSlug);
    }

    public function provideAnimatorCanDemoteCoAnimatorFromView(): iterable
    {
        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-paris',
            '7ba7b43a-4a65-4862-b49a-91776043575b',
            'titouan@mobilisation-eu.localhost',
        ];

        yield [
            'marine@mobilisation-eu.localhost',
            'ecology-in-paris',
            '9b1f4321-8935-4ab5-b392-1e6f6913ace9',
            'francis@mobilisation-eu.localhost',
        ];

        yield [
            'titouan@mobilisation-eu.localhost',
            'ecology-in-clichy',
            'b4e514ac-5ccb-4687-aed1-14d3678b5491',
            'marine@mobilisation-eu.localhost',
        ];
    }

    /**
     * @dataProvider provideAnimatorCanDemoteCoAnimatorFromView
     */
    public function testAnimatorCanDemoteCoAnimatorFromView(
        string $animatorEmail,
        string $groupSlug,
        string $coAnimatorUuid,
        string $coAnimatorEmail
    ): void {
        $this->authenticateActor($animatorEmail);

        $crawler = $this->client->request('GET', "/group/$groupSlug/members");
        $this->assertResponseSuccessFul();

        $this->assertCount(1, $coAnimatorRow = $crawler->filter("#co-animators tr:contains(\"$coAnimatorEmail\")"));
        $this->assertCount(0, $crawler->filter("#followers tr:contains(\"$coAnimatorEmail\")"));
        $this->assertCount(1, $linkCrawler = $coAnimatorRow->selectLink('Demote'));

        $link = $linkCrawler->link();
        $this->assertSame($this->getAbsoluteUrl("/group/$groupSlug/demote/$coAnimatorUuid"), $link->getUri());

        $this->client->click($link);
        $this->assertIsRedirectedTo("/group/$groupSlug/members");
        $this->assertNoMailSent();

        $crawler = $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertCount(1, $crawler->filter('.alert:contains("group.animator.demote.flash.success")'));
        $this->assertCount(0, $crawler->filter("#co-animators tr:contains(\"$coAnimatorEmail\")"));
        $this->assertCount(1, $crawler->filter("#followers tr:contains(\"$coAnimatorEmail\")"));
    }

    public function provideActorCannotDemoteIfGroupIsNotApproved(): iterable
    {
        // animator of the group
        yield ['thomas@mobilisation-eu.localhost', 'development-in-lille', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        // co-animator of the group
        yield ['remi@mobilisation-eu.localhost', 'development-in-lille', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        // follower of the group
        yield ['nicolas@mobilisation-eu.localhost', 'development-in-lille', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        // no relation with the group
        yield ['manon@mobilisation-eu.localhost', 'development-in-lille', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
    }

    /**
     * @dataProvider provideActorCannotDemoteIfGroupIsNotApproved
     */
    public function testActorCannotDemoteIfGroupIsNotApproved(
        string $actorEmail,
        string $groupSlug,
        string $followerUuid
    ): void {
        $this->assertActorIsCoAnimatorOfGroup($followerUuid, $groupSlug);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/demote/$followerUuid");
        $this->assertNotFoundResponse();
        $this->assertNoMailSent();

        $this->assertActorIsCoAnimatorOfGroup($followerUuid, $groupSlug);
    }

    public function provideAnonymousCannotDemoteCoAnimators(): iterable
    {
        yield ['ecology-in-paris', '7ba7b43a-4a65-4862-b49a-91776043575b'];
        yield ['ecology-in-paris', '9b1f4321-8935-4ab5-b392-1e6f6913ace9'];
        yield ['ecology-in-clichy', 'b4e514ac-5ccb-4687-aed1-14d3678b5491'];
    }

    /**
     * @dataProvider provideAnonymousCannotDemoteCoAnimators
     */
    public function testAnonymousCannotDemoteCoAnimator(string $groupSlug, string $coAnimatorUuid): void
    {
        $this->assertActorIsCoAnimatorOfGroup($coAnimatorUuid, $groupSlug);

        $this->client->request('GET', "/group/$groupSlug/demote/$coAnimatorUuid");
        $this->assertIsRedirectedTo('/login');
        $this->assertNoMailSent();

        $this->assertActorIsCoAnimatorOfGroup($coAnimatorUuid, $groupSlug);
    }

    public function provideActorCannotDemoteCoAnimators(): iterable
    {
        // co-animator of the group
        yield ['francis@mobilisation-eu.localhost', 'ecology-in-paris', '7ba7b43a-4a65-4862-b49a-91776043575b'];
        // follower of the group
        yield ['remi@mobilisation-eu.localhost', 'ecology-in-paris', '7ba7b43a-4a65-4862-b49a-91776043575b'];
        // no relation with the group
        yield ['nicolas@mobilisation-eu.localhost', 'ecology-in-paris', '7ba7b43a-4a65-4862-b49a-91776043575b'];
    }

    /**
     * @dataProvider provideActorCannotDemoteCoAnimators
     */
    public function testActorCannotDemoteCoAnimator(string $actorEmail, string $groupSlug, string $coAnimatorUuid): void
    {
        $this->assertActorIsCoAnimatorOfGroup($coAnimatorUuid, $groupSlug);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/demote/$coAnimatorUuid");
        $this->assertAccessDeniedResponse();
        $this->assertNoMailSent();

        $this->assertActorIsCoAnimatorOfGroup($coAnimatorUuid, $groupSlug);
    }

    private function assertActorIsFollowerOfGroup(string $actorUuid, string $groupSlug): void
    {
        $this->assertIfActorIsPromotedInGroup($actorUuid, $groupSlug, false);
    }

    private function assertActorIsCoAnimatorOfGroup(string $actorUuid, string $groupSlug): void
    {
        $this->assertIfActorIsPromotedInGroup($actorUuid, $groupSlug, true);
    }

    private function assertIfActorIsPromotedInGroup(string $actorUuid, string $groupSlug, bool $promoted): void
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get(EntityManagerInterface::class);
        $filters = $entityManager->getFilters();

        if ($enabled = $filters->isEnabled('refused')) {
            $filters->disable('refused');
        }

        $entityManager->clear();

        $actor = $this->getActorRepository()->findOneByUuid($actorUuid);
        $group = $this->getGroupRepository()->findOneBySlug($groupSlug);

        $this->assertSame($promoted, $actor->isCoAnimatorOf($group));
        $this->assertSame(!$promoted, $actor->isFollowerOf($group));

        if ($enabled) {
            $filters->enable('refused');
        }
    }
}
