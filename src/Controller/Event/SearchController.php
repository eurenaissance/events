<?php

namespace App\Controller\Event;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/event/search", name="app_event_search", methods="GET")
     */
    public function search(EventRepository $repo): Response
    {
        return $this->render('event/search/search.html.twig', [
            'events' => $repo->findHomeUpcoming(30),
        ]);
    }
}
