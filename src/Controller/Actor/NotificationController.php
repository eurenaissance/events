<?php

namespace App\Controller\Actor;

use App\Entity\Actor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/notifications")
 */
class NotificationController extends AbstractController
{
    /**
     * @Route("/{uuid}/manage", name="app_actor_notifications_manage", methods={"GET", "POST"})
     */
    public function manage(Actor $actor, Request $request): Response
    {
        throw new \LogicException('To implement');
    }
}
