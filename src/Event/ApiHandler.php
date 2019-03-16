<?php

namespace App\Event;

use App\Entity\Event;
use App\Repository\EventRepository;
use Spatie\SchemaOrg\Schema;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ApiHandler
{
    /**
     * @var EventRepository
     */
    private $repository;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    public function __construct(EventRepository $repository, UrlGeneratorInterface $generator)
    {
        $this->repository = $repository;
        $this->urlGenerator = $generator;
    }

    public function toEventSchema(): array
    {
        $events = [];
        $upcomingEvents = $this->repository->findUpcoming(null, 500);

        /** @var Event $upcomingEvent */
        foreach ($upcomingEvents as $upcomingEvent) {
            $event = Schema::event();
            $event->setProperty('@id', $upcomingEvent->getUuid());
            $event->name($upcomingEvent->getName());
            $event->description($upcomingEvent->getDescription());
            $event->startDate($upcomingEvent->getBeginAt());
            $event->endDate($upcomingEvent->getFinishAt());
            $event->url($this->urlGenerator->generate(
                'app_event_view',
                ['slug' => $upcomingEvent->getSlug()],
                UrlGenerator::ABSOLUTE_URL
            ));

            $location = Schema::postalAddress();
            $location->addressCountry($upcomingEvent->getCountry());
            $location->postalCode($upcomingEvent->getZipCode());
            $location->addressLocality($upcomingEvent->getCity());
            $location->streetAddress($upcomingEvent->getAddress());
            $event->location($location);

            $events[] = $event->toArray();
        }

        return [
            '@context' => '/contexts/Event',
            '@id' => '/events',
            '@type' => 'hydra:Collection',
            'hydra:member' => $events,
        ];
    }
}
