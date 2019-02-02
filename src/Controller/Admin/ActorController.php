<?php

namespace App\Controller\Admin;

use App\Security\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    /**
     * @Route("/impersonation/exit", name="app_admin_impersonation_exit", methods="GET")
     */
    public function exitImpersonation(AuthenticationUtils $authenticationUtils): Response
    {
        $impersonatedUser = $this->getUser();

        if (!$impersonatingUser = $authenticationUtils->getImpersonatingUser()) {
            return $this->redirectToRoute('app_homepage');
        }

        $authenticationUtils->authenticateAdministrator($impersonatingUser);

        return $this->redirectToRoute('admin_app_actor_show', ['id' => $impersonatedUser->getId()]);
    }
}
