<?php

namespace App\Controller\Group;

use App\Entity\Group;
use App\Repository\Group\FollowerMembershipRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MembersController extends AbstractController
{
    public const FOLLOWER_MEMBERSHIPS_PAGE_PARAMETER = 'page';

    /**
     * @Route("/{slug}/members", name="app_group_view_members", methods="GET")
     * @Entity("group", expr="repository.findApprovedBySlug(slug)")
     */
    public function members(
        Group $group,
        Request $request,
        FollowerMembershipRepository $followerMembershipRepository
    ): Response {
        $this->denyAccessUnlessGranted('GROUP_MEMBERS', $group);

        $followerMembershipsPage = $request->get(self::FOLLOWER_MEMBERSHIPS_PAGE_PARAMETER, 1);
        $followerMembershipsPerPage = 30;

        $followerMemberships = $followerMembershipRepository->findFollowers(
            $group,
            $followerMembershipsPerPage,
            $followerMembershipsPage
        );

        return $this->render('group/members/members.html.twig', [
            'group' => $group,
            'follower_memberships' => $followerMemberships,
            'follower_memberships_page' => $followerMembershipsPage,
            'follower_memberships_total_pages' => ceil($followerMemberships->count() / $followerMembershipsPerPage),
        ]);
    }
}
