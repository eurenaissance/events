<?php

namespace App\Controller\Group;

use App\Entity\Group;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    public const FINISHED_EVENTS_PAGE_PARAMETER = 'page';

    /**
     * @Route("/{slug}", name="app_group_view", methods="GET")
     */
    public function view(Group $group, Request $request, EventRepository $eventRepository): Response
    {
        if ($group->isRefused()) {
            throw $this->createNotFoundException();
        }

        $this->denyAccessUnlessGranted('GROUP_VIEW', $group);

        $finishedEventsPage = $request->get(self::FINISHED_EVENTS_PAGE_PARAMETER, 1);
        $finishedEventsPerPage = 30;

        $finishedEvents = $eventRepository->findFinished($group, $finishedEventsPerPage, $finishedEventsPage);

        return $this->render('group/view/view.html.twig', [
            'group' => $group,
            'upcoming_events' => $eventRepository->findUpcoming($group, 10),
            'finished_events' => $finishedEvents,
            'finished_events_page' => $finishedEventsPage,
            'finished_events_total_pages' => ceil($finishedEvents->count() / $finishedEventsPerPage),
        ]);
    }
}
