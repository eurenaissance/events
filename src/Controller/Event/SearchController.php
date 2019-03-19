<?php

namespace App\Controller\Event;

use App\Repository\CityRepository;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/event/search", name="app_event_search", methods="GET")
     */
    public function search(EventRepository $repo, CityRepository $cityRepo): Response
    {
        $events = $repo->search($cityRepo->findOneByUuid('83cd3d14-fc47-4436-b382-cbb0df910a43'), '', 500);

        return $this->render('event/search/search.html.twig', [
            'events' => $events,
        ]);
    }
}
