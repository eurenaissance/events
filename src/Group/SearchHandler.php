<?php

namespace App\Group;

use App\Entity\Actor;
use App\Repository\CityRepository;
use App\Repository\GroupRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class SearchHandler
{
    private const DEFAULT_DISTANCE = 100;

    private $groupRepository;
    private $cityRepository;
    private $actor;

    public function __construct(GroupRepository $groupRepository, CityRepository $cityRepository, Security $security)
    {
        $actor = $security->getUser();

        if (!$actor instanceof Actor) {
            throw new \InvalidArgumentException('Current user must be an actor to search groups');
        }

        $this->groupRepository = $groupRepository;
        $this->cityRepository = $cityRepository;
        $this->actor = $actor;
    }

    public function search(Request $request): iterable
    {
        $distanceMax = $request->query->get('distance', self::DEFAULT_DISTANCE);
        $city = ($cityUuid = $request->query->get('city'))
            ? $this->cityRepository->findOneByUuid($cityUuid)
            : $this->actor->getCity()
        ;

        return $this->groupRepository->search($city, $distanceMax);
    }
}