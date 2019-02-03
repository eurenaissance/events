<?php

namespace App\Controller\Event;

use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    /**
     * @Route("/event/{slug}", name="app_event_view", methods="GET")
     */
    public function view(Event $event): Response
    {
        return $this->render('event/view/view.html.twig', [
            'event' => $event,
        ]);
    }
}
