<?php

namespace App\Controller\Admin;

use App\Entity\Group;
use App\Group\AdministrationHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/group")
 * @IsGranted("ROLE_ADMIN_GROUPS")
 */
class GroupController extends AbstractController
{
    /**
     * @Route("/{group}/approve", name="app_admin_group_approve", methods="GET")
     */
    public function approve(AdministrationHandler $administrationHandler, Group $group): Response
    {
        if ($group->isApproved()) {
            $this->addFlash('error', sprintf('Group "%s" has already been approved.', $group->getName()));
        } else {
            $administrationHandler->approve($group);

            $this->addFlash('success', sprintf('Group "%s" has been approved successfully.', $group->getName()));
        }

        return $this->redirectToRoute('admin_app_group_edit', ['id' => $group->getId()]);
    }

    /**
     * @Route("/{group}/refuse", name="app_admin_group_refuse", methods="GET")
     */
    public function refuse(AdministrationHandler $administrationHandler, Group $group): Response
    {
        if ($group->isRefused()) {
            $this->addFlash('error', sprintf('Group "%s" has already been refused.', $group->getName()));
        } else {
            $administrationHandler->refuse($group);

            $this->addFlash('warning', sprintf('Group "%s" has been refused successfully.', $group->getName()));
        }

        return $this->redirectToRoute('admin_app_group_edit', ['id' => $group->getId()]);
    }
}
