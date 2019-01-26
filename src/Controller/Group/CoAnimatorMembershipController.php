<?php

namespace App\Controller\Group;

use App\Entity\Group;
use App\Group\FollowerMembershipHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoAnimatorMembershipController extends AbstractController
{
    /**
     * @Route("/group/{slug}/follow", name="app_group_follow", methods="GET")
     */
    public function follow(FollowerMembershipHandler $registrationHandler, Group $group): Response
    {
        $this->denyAccessUnlessGranted('GROUP_FOLLOW', $group);

        $registrationHandler->follow($this->getUser(), $group);

        $this->addFlash('info', 'group.follower_membership.follow.flash.success');

        return $this->redirectToRoute('app_group_view', ['slug' => $group->getSlug()]);
    }

    /**
     * @Route("/group/{slug}/unfollow", name="app_group_unfollow", methods="GET")
     */
    public function unfollow(FollowerMembershipHandler $registrationHandler, Group $group): Response
    {
        $this->denyAccessUnlessGranted('GROUP_UNFOLLOW', $group);

        $registrationHandler->unfollow($this->getUser(), $group);

        $this->addFlash('info', 'group.follower_membership.unfollow.flash.success');

        return $this->redirectToRoute('app_group_view', ['slug' => $group->getSlug()]);
    }
}
