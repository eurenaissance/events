<?php

namespace App\Event;

use App\Entity\Actor;
use App\Repository\CityRepository;
use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class SearchHandler
{
    private const DEFAULT_DISTANCE = 100;

    private $eventRepository;
    private $cityRepository;
    private $actor;

    public function __construct(EventRepository $eventRepository, CityRepository $cityRepository, Security $security)
    {
        $this->eventRepository = $eventRepository;
        $this->cityRepository = $cityRepository;
        $this->actor = $security->getUser();
    }

    public function search(Request $request): iterable
    {
        $distanceMax = $request->query->get('distance', self::DEFAULT_DISTANCE);

        if ($cityUuid = $request->query->get('city')) {
            $city = $this->cityRepository->findOneByUuid($cityUuid);
        } elseif ($this->actor instanceof Actor) {
            $city = $this->actor->getCity();
        } else {
            $city = $this->cityRepository->findOneByName('Paris');
        }

        return $this->eventRepository->search($city, $distanceMax);
    }
}
