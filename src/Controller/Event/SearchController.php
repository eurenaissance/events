<?php

namespace App\Controller\Event;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/event/search", name="app_event_search", methods="GET")
     */
    public function search(): Response
    {
        throw new \LogicException('To implement');
    }
}
