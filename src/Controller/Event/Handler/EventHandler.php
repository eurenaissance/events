<?php

namespace App\Controller\Event\Handler;

use App\Entity\Event;
use App\Repository\EventRepository;
use Spatie\SchemaOrg\Schema;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EventHandler
{
    /**
     * @var EventRepository
     */
    private $repository;
    /**
     * @var UrlGeneratorInterface
     */
    private $generator;

    public function __construct(EventRepository $repository, UrlGeneratorInterface $generator)
    {
        $this->repository = $repository;
        $this->generator = $generator;
    }

    public function toEventSchema(): array
    {
        $events = [];
        $upcomingEvents = $this->repository->findUpcoming(null, 100);
        /** @var Event $upcomingEvent */
        foreach ($upcomingEvents as $upcomingEvent) {
            $url = $this->generator->generate('app_event_view', ['slug' => $upcomingEvent->getSlug()], UrlGenerator::ABSOLUTE_URL);

            $event = Schema::event();
            $event->setProperty('@id', $upcomingEvent->getUuid());
            $event->name($upcomingEvent->getName());
            $event->description($upcomingEvent->getDescription());
            $event->startDate($upcomingEvent->getBeginAt());
            $event->endDate($upcomingEvent->getFinishAt());

            $location = Schema::postalAddress();
            $location->addressCountry($upcomingEvent->getCountry());
            $location->postalCode($upcomingEvent->getZipCode());
            $location->addressLocality($upcomingEvent->getCity());
            $location->streetAddress($upcomingEvent->getAddress());
            $event->location($location);
            $event->url($url);

            $events[] = $event->toArray();
        }

        $hydraEvents = [
            '@context' => '/contexts/Event',
            '@id' => '/events',
            '@type' => 'hydra:Collection',
            'hydra:member' => $events,
        ];

        return $hydraEvents;
    }
}
