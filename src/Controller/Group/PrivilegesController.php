<?php

namespace App\Controller\Group;

use App\Entity\Actor;
use App\Entity\Group;
use App\Group\CoAnimatorMembershipHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivilegesController extends AbstractController
{
    /**
     * @Route(
     *     "/{slug}/promote/{uuid}",
     *     name="app_group_promote",
     *     methods="GET",
     *     requirements={"uuid": "%pattern_uuid%"}
     * )
     * @Entity("group", expr="repository.findApprovedBySlug(slug)")
     * @Entity("actor", expr="repository.findOneByUuid(uuid)")
     */
    public function promote(
        CoAnimatorMembershipHandler $coAnimatorMembershipHandler,
        Group $group,
        Actor $actor
    ): Response {
        $this->denyAccessUnlessGranted('GROUP_PRIVILEGES', $group);

        $coAnimatorMembershipHandler->promote($actor, $group);

        $this->addFlash('success', 'flashes.group.promote_success');

        return $this->redirectToRoute('app_group_view_members', ['slug' => $group->getSlug()]);
    }

    /**
     * @Route(
     *     "/{slug}/demote/{uuid}",
     *     name="app_group_demote",
     *     methods="GET",
     *     requirements={"uuid": "%pattern_uuid%"}
     * )
     * @Entity("group", expr="repository.findApprovedBySlug(slug)")
     * @Entity("actor", expr="repository.findOneByUuid(uuid)")
     */
    public function demote(
        CoAnimatorMembershipHandler $coAnimatorMembershipHandler,
        Group $group,
        Actor $actor
    ): Response {
        $this->denyAccessUnlessGranted('GROUP_PRIVILEGES', $group);

        $coAnimatorMembershipHandler->demote($actor, $group);

        $this->addFlash('success', 'flashes.group.demote_success');

        return $this->redirectToRoute('app_group_view_members', ['slug' => $group->getSlug()]);
    }
}
