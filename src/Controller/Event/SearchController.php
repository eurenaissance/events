<?php

namespace App\Controller\Event;

use App\DataExposer\DataExposer;
use App\Entity\Actor;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/event/search", name="app_event_search", methods="GET")
     */
    public function search(DataExposer $exposer, EventRepository $repo): Response
    {
        /** @var Actor $actor */
        $actor = $this->getUser();

        $exposer->expose('default_city', !$actor ? null : [
            'uuid' => $actor->getCity()->getUuidAsString(),
            'name' => $actor->getCity()->getName(),
        ]);

        return $this->render('event/search/search.html.twig', [
            'events' => $repo->findHomeUpcoming(30),
        ]);
    }
}
