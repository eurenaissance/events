<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Repository\GroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage", methods="GET")
     */
    public function homepage(EventRepository $eventsRepo, GroupRepository $groupRepo): Response
    {
        return $this->render('homepage.html.twig', [
            'upcomingEvents' => $eventsRepo->findHomeUpcoming(),
            'mostActiveGroups' => $groupRepo->findHomeMostActive(),
        ]);
    }

    /**
     * @Route("/design", name="app_design", methods="GET")
     */
    public function design(): Response
    {
        return $this->render('design.html.twig');
    }
}
