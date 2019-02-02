<?php

namespace Test\App\Controller;

use App\Entity\Group;
use App\Tests\HttpTestCase;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @group functional
 */
class FollowerControllerTest extends HttpTestCase
{
    public function provideMemberCannotFollowGroups(): iterable
    {
        // animator of the group
        yield ['marine@mobilisation-eu.localhost', 'ecology-in-paris', true];
        // co-animator of the group
        yield ['titouan@mobilisation-eu.localhost', 'ecology-in-paris', true];
        // follower of the group
        yield ['remi@mobilisation-eu.localhost', 'ecology-in-paris', true];
    }

    /**
     * @dataProvider provideMemberCannotFollowGroups
     */
    public function testMemberCannotFollowGroup(string $actorEmail, string $groupSlug, bool $isMember): void
    {
        $this->assertIfActorIsMemberOfGroup($actorEmail, $groupSlug, $isMember);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/follow");
        $this->assertAccessDeniedResponse();
        $this->assertNoMailSent();

        $this->assertIfActorIsMemberOfGroup($actorEmail, $groupSlug, $isMember);
    }

    public function provideActorCannotFollowOrUnfollowIfGroupIsNotApproved(): iterable
    {
        // animator of the refused group
        yield ['thomas@mobilisation-eu.localhost', 'development-in-lille', 3];
        // co-animator of the refused group
        yield ['remi@mobilisation-eu.localhost', 'development-in-lille', 3];
        // follower of the refused group
        yield ['nicolas@mobilisation-eu.localhost', 'development-in-lille', 3];
        // no relation with the refused group
        yield ['titouan@mobilisation-eu.localhost', 'development-in-lille', 3];
        // animator of the pending group
        yield ['marine@mobilisation-eu.localhost', 'culture-in-paris', 1];
        // no relation with the pending group
        yield ['titouan@mobilisation-eu.localhost', 'culture-in-paris', 1];
        yield ['remi@mobilisation-eu.localhost', 'culture-in-paris', 1];
    }

    /**
     * @dataProvider provideActorCannotFollowOrUnfollowIfGroupIsNotApproved
     */
    public function testActorCannotFollowIfGroupIsNotApproved(
        string $actorEmail,
        string $groupSlug,
        int $actualMembersCount
    ): void {
        $this->assertGroupMembersCount($groupSlug, $actualMembersCount);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/follow");
        $this->assertNotFoundResponse();
        $this->assertNoMailSent();

        $this->assertGroupMembersCount($groupSlug, $actualMembersCount);
    }

    public function provideAnonymousCannotFollowAndUnfollowGroup(): iterable
    {
        yield ['ecology-in-paris', 4];
        yield ['ecology-in-clichy', 3];
        yield ['ecology-in-nice', 2];
        yield ['ecology-in-nantes', 1];
    }

    /**
     * @dataProvider provideAnonymousCannotFollowAndUnfollowGroup
     */
    public function testAnonymousCannotFollowGroup(string $groupSlug, int $actualMembersCount): void
    {
        $this->assertGroupMembersCount($groupSlug, $actualMembersCount);

        $this->client->request('GET', "/group/$groupSlug/follow");
        $this->assertIsRedirectedTo('/login');
        $this->assertNoMailSent();

        $this->assertGroupMembersCount($groupSlug, $actualMembersCount);
    }

    public function provideActorCanFollowGroups(): iterable
    {
        yield [
            'remi@mobilisation-eu.localhost',
            'Rémi Gardien',
            'ecology-in-nice',
            'Ecology in Nice',
            'jacques@mobilisation-eu.localhost',
            'Jacques',
        ];

        yield [
            'remi@mobilisation-eu.localhost',
            'Rémi Gardien',
            'culture-in-cannes',
            'Culture in Cannes',
            'nicolas@mobilisation-eu.localhost',
            'Nicolas',
        ];

        yield [
            'remi@mobilisation-eu.localhost',
            'Rémi Gardien',
            'ecology-in-nantes',
            'Ecology in Nantes',
            'manon@mobilisation-eu.localhost',
            'Manon',
        ];
    }

    /**
     * @dataProvider provideActorCanFollowGroups
     */
    public function testActorCanFollowGroup(
        string $actorEmail,
        string $actorFullName,
        string $groupSlug,
        string $groupName,
        string $animatorEmail,
        string $animatorName
    ): void {
        $this->assertIfActorIsMemberOfGroup($actorEmail, $groupSlug, false);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/follow");
        $this->assertIsRedirectedTo("/group/$groupSlug");
        $this->assertMailSent([
            'to' => $animatorEmail,
            'subject' => "Your group \"$groupName\" has a new follower!",
            'body' => "@string@
                        .contains('Hello $animatorName!')
                        .contains('$actorFullName just started to follow your group \"$groupName\".')",
        ]);

        $this->client->followRedirect();
        $this->assertResponseSuccessFul();
        $this->assertResponseContains('group.follower.follow.flash.success');

        $this->assertIfActorIsMemberOfGroup($actorEmail, $groupSlug, true);
    }

    public function provideActorCannotUnfollowGroups(): iterable
    {
        // animator of the group
        yield ['titouan@mobilisation-eu.localhost', 'ecology-in-clichy', true];
        // co-animator of the group
        yield ['marine@mobilisation-eu.localhost', 'ecology-in-clichy', true];
        // no relation with the group
        yield ['nicolas@mobilisation-eu.localhost', 'ecology-in-clichy', false];
    }

    /**
     * @dataProvider provideActorCannotUnfollowGroups
     */
    public function testActorCannotUnfollowGroup(string $actorEmail, string $groupSlug, bool $isMember): void
    {
        $this->assertIfActorIsMemberOfGroup($actorEmail, $groupSlug, $isMember);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/unfollow");
        $this->assertAccessDeniedResponse();
        $this->assertNoMailSent();

        $this->assertIfActorIsMemberOfGroup($actorEmail, $groupSlug, $isMember);
    }

    /**
     * @dataProvider provideActorCannotFollowOrUnfollowIfGroupIsNotApproved
     */
    public function testActorCannotUnfollowIfGroupIsNotApproved(
        string $actorEmail,
        string $groupSlug,
        int $actualMembersCount
    ): void {
        $this->assertGroupMembersCount($groupSlug, $actualMembersCount);

        $this->authenticateActor($actorEmail);

        $this->client->request('GET', "/group/$groupSlug/unfollow");
        $this->assertNotFoundResponse();
        $this->assertNoMailSent();

        $this->assertGroupMembersCount($groupSlug, $actualMembersCount);
    }

    /**
     * @dataProvider provideAnonymousCannotFollowAndUnfollowGroup
     */
    public function testAnonymousCannotUnfollowGroup(string $groupSlug, int $actualMembersCount): void
    {
        $this->assertGroupMembersCount($groupSlug, $actualMembersCount);

        $this->client->request('GET', "/group/$groupSlug/unfollow");
        $this->assertIsRedirectedTo('/login');
        $this->assertNoMailSent();

        $this->assertGroupMembersCount($groupSlug, $actualMembersCount);
    }

    private function assertGroupMembersCount(string $groupSlug, int $expectedMembersCount): void
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get(EntityManagerInterface::class);
        $filters = $entityManager->getFilters();

        if ($enabled = $filters->isEnabled('refused')) {
            $filters->disable('refused');
        }

        $entityManager->clear();

        $group = $this->getGroupRepository()->findOneBySlug($groupSlug);

        $this->assertSame($expectedMembersCount, $group->getMembersCount());

        if ($enabled) {
            $filters->enable('refused');
        }
    }

    private function assertIfActorIsMemberOfGroup(string $actorEmail, string $groupSlug, bool $isMember): void
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get(EntityManagerInterface::class);
        $filters = $entityManager->getFilters();

        if ($enabled = $filters->isEnabled('refused')) {
            $filters->disable('refused');
        }

        $entityManager->clear();

        $actor = $this->getActorRepository()->findOneByEmail($actorEmail);
        $group = $this->getGroupRepository()->findOneBySlug($groupSlug);

        $this->assertSame($isMember, $actor->isMemberOfGroup($group));

        if ($enabled) {
            $filters->enable('refused');
        }
    }
}
