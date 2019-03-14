<?php

namespace App\Controller\Event;

use App\Entity\Event;
use Ical\Ical;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController extends AbstractController
{
    /**
     * @Route("/event/{slug}/ics", name="app_event_ics", methods={"GET"})
     */
    public function ics(Event $event): Response
    {
        $dateFinished = $event->getFinishAt() ?? new \DateTime($event->getCreatedAt()->format('c').' +1hour');
        $address = sprintf('%s %s %s (%s)', $event->getAddress(), $event->getZipCode(), $event->getCity(), $event->getCountry());

        $ical = (new Ical())->setAddress($address)
            ->setDateStart(new \DateTime($event->getCreatedAt()->format('c')))
            ->setDateEnd($dateFinished)
            ->setDescription($event->getDescription())
            ->setSummary($event->getName())
            ->setFilename('event.ics');

        $response = new Response($ical->getICAL());
        $response->headers->set('Content-Disposition', 'attachment; filename=event.ics');
        $response->headers->set('Content-Type', 'text/calendar; charset=utf-8');

        return $response;
    }
}
