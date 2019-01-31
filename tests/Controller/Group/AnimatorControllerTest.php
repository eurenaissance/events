<?php

namespace Test\App\Controller;

use App\Entity\Group;
use App\Tests\HttpTestCase;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\FilterCollection;

/**
 * @group functional
 */
class AnimatorControllerTest extends HttpTestCase
{
    public function provideAnimatorCanPromoteFollowers(): iterable
    {
        yield ['marine@mobilisation-eu.localhost', 'ecology-in-paris', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        yield ['titouan@mobilisation-eu.localhost', 'ecology-in-clichy', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
        yield ['nicolas@mobilisation-eu.localhost', 'culture-in-asnieres', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
    }

    /**
     * @dataProvider provideAnimatorCanPromoteFollowers
     */
    public function testAnimatorCanPromoteFollower(string $animatorEmail, string $groupSlug, string $followerUuid): void
    {
        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);

        $this->authenticateActor($animatorEmail);

        $this->client->request('GET', "/group/$groupSlug/promote/$followerUuid");
        $this->assertIsRedirectedTo("/group/$groupSlug");

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('group.animator.promote.flash.success');

        $this->assertActorIsCoAnimatorOfGroup($followerUuid, $groupSlug);
    }

    public function provideActorCannotPromoteIfGroupIsNotApproved(): iterable
    {
        // animator of the group
        yield ['thomas@mobilisation-eu.localhost', 'development-in-lille', '2a9051e9-7cea-460f-a714-052079d4aa2b'];
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

        $this->assertActorIsFollowerOfGroup($followerUuid, $groupSlug);
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
        $this->assertIsRedirectedTo("/group/$groupSlug");

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('group.animator.demote.flash.success');

        $this->assertActorIsFollowerOfGroup($coAnimatorUuid, $groupSlug);
    }

    public function provideActorCannotDemoteIfGroupIsNotApproved(): iterable
    {
        // animator of the group
        yield ['thomas@mobilisation-eu.localhost', 'development-in-lille', '472508fa-4e4d-4330-8fda-5fefc92b1a8a'];
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
        /** @var FilterCollection $filters */
        $filters = $this->get(EntityManagerInterface::class)->getFilters();
        if ($enabled = $filters->isEnabled('refused')) {
            $filters->disable('refused');
        }

        $actorRepository = $this->getActorRepository();
        $groupRepository = $this->getGroupRepository();

        $actorRepository->clear();
        $groupRepository->clear();

        $actor = $actorRepository->findOneByUuid($actorUuid);
        $groups = $groupRepository->findWithoutFilters(['slug' => $groupSlug]);
        /** @var Group $group */
        $group = $groups[0];
        $this->assertSame($promoted, $actor->isCoAnimatorOf($group));
        $this->assertSame(!$promoted, $actor->isFollowerOf($group));

        if ($enabled) {
            $filters->enable('refused');
        }
    }
}
