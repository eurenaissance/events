<?php

namespace App\Controller\Group;

use App\Entity\Group;
use App\Group\FollowerMembershipHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FollowerController extends AbstractController
{
    /**
     * @Route("/{slug}/follow", name="app_group_follow", methods="GET")
     * @Entity("group", expr="repository.findApprovedBySlug(slug)")
     */
    public function follow(FollowerMembershipHandler $followerMembershipHandler, Group $group): Response
    {
        $this->denyAccessUnlessGranted('GROUP_FOLLOW', $group);

        $followerMembershipHandler->follow($this->getUser(), $group);

        $this->addFlash('info', 'group.follower.follow.flash.success');

        return $this->redirectToRoute('app_group_view', ['slug' => $group->getSlug()]);
    }

    /**
     * @Route("/{slug}/unfollow", name="app_group_unfollow", methods="GET")
     * @Entity("group", expr="repository.findApprovedBySlug(slug)")
     */
    public function unfollow(FollowerMembershipHandler $followerMembershipHandler, Group $group): Response
    {
        $this->denyAccessUnlessGranted('GROUP_UNFOLLOW', $group);

        $followerMembershipHandler->unfollow($this->getUser(), $group);

        $this->addFlash('info', 'group.follower.unfollow.flash.success');

        return $this->redirectToRoute('app_group_view', ['slug' => $group->getSlug()]);
    }
}
