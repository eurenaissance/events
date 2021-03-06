<?php

namespace App\Controller\Admin;

use App\Entity\Group;
use App\Group\AdministrationHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/group")
 */
class GroupController extends AbstractController
{
    /**
     * @Route("/{group}/approve", name="app_admin_group_approve", methods="GET")
     */
    public function approve(AdministrationHandler $administrationHandler, Group $group): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN_GROUP_REVIEW');

        if ($group->isApproved()) {
            $this->addFlash('warning', sprintf('Group "%s" has already been approved.', $group->getName()));
        } else {
            $administrationHandler->approve($group);

            $this->addFlash('success', sprintf('Group "%s" has been approved successfully.', $group->getName()));
        }

        return $this->redirectToRoute('admin_app_group_show', ['id' => $group->getId()]);
    }

    /**
     * @Route("/{group}/refuse", name="app_admin_group_refuse", methods="GET")
     */
    public function refuse(AdministrationHandler $administrationHandler, Group $group): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN_GROUP_REVIEW');

        if ($group->isRefused()) {
            $this->addFlash('warning', sprintf('Group "%s" has already been refused.', $group->getName()));
        } else {
            $administrationHandler->refuse($group);

            $this->addFlash('danger', sprintf('Group "%s" has been refused successfully.', $group->getName()));
        }

        return $this->redirectToRoute('admin_app_group_show', ['id' => $group->getId()]);
    }
}
