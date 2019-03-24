<?php

namespace App\Controller\Event;

use App\Entity\Event;
use Ical\Ical;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CalendarController extends AbstractController
{
    /**
     * @Route("/event/{slug}/google", name="app_event_calendar_google", methods={"GET"})
     */
    public function google(Event $event): Response
    {
        $details = $event->getDescription()."\n\n";
        $details .= $this->generateUrl('app_event_view', ['slug' => $event->getSlug()], UrlGeneratorInterface::ABSOLUTE_URL);

        $query = [
            'action' => 'TEMPLATE',
            'text' => $event->getName(),
            'details' => $details,
            'location' => $event->getAddress().' '.$event->getZipCode().' '.$event->getCity().' '.$event->getCountry(),
            'dates' => implode('/', [
                $event->getBeginAt()->format('Ymd\THis\Z'),
                $event->getFinishAt()->format('Ymd\THis\Z'),
            ]),
        ];

        return $this->redirect('https://calendar.google.com/calendar/r/eventedit?'.http_build_query($query));
    }

    /**
     * @Route("/event/{slug}/ics", name="app_event_calendar_ics", methods={"GET"})
     */
    public function ics(Event $event): Response
    {
        $details = $event->getDescription()."\n\n";
        $details .= $this->generateUrl('app_event_view', ['slug' => $event->getSlug()], UrlGeneratorInterface::ABSOLUTE_URL);

        $dateFinished = $event->getFinishAt() ?? new \DateTime($event->getCreatedAt()->format('c').' +1hour');
        $address = sprintf('%s %s %s (%s)', $event->getAddress(), $event->getZipCode(), $event->getCity(), $event->getCountry());

        $ical = (new Ical())->setAddress($address)
            ->setDateStart(new \DateTime($event->getCreatedAt()->format('c')))
            ->setDateEnd($dateFinished)
            ->setDescription($details)
            ->setSummary($event->getName())
            ->setFilename('event-'.$event->getSlug().'.ics');

        $response = new Response($ical->getICAL());
        $response->headers->set('Content-Disposition', 'attachment; filename=event-'.$event->getSlug().'.ics');
        $response->headers->set('Content-Type', 'text/calendar; charset=utf-8');

        return $response;
    }
}
