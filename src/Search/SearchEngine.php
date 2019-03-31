<?php

namespace App\Search;

use App\Entity\City;
use App\Entity\Event;
use App\Entity\Group;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Twig\Environment;

class SearchEngine
{
    private $cityRepo;
    private $eventRepo;
    private $groupRepo;
    private $serializer;
    private $twig;

    public function __construct(EntityManagerInterface $manager, SerializerInterface $serializer, Environment $twig)
    {
        $this->cityRepo = $manager->getRepository(City::class);
        $this->eventRepo = $manager->getRepository(Event::class);
        $this->groupRepo = $manager->getRepository(Group::class);
        $this->serializer = $serializer;
        $this->twig = $twig;
    }

    public function searchEvent(Request $request): JsonResponse
    {
        $term = (string) $request->query->get('q', '');
        $city = $this->cityRepo->findOneByUuid($request->query->get('c'));

        /** @var Event[] $data */
        $data = $this->eventRepo->search($city, $term);

        $events = [];
        foreach ($data as $event) {
            $events[] = [
                'name' => $event->getName(),
                'slug' => $event->getSlug(),
                'date' => [
                    'day' => $event->getBeginAt()->format('d'),
                    'month' => trim($this->twig->render('_components/localized_date/month.html.twig', [
                        'date' => $event->getBeginAt(),
                    ])),
                    'full' => trim($this->twig->render('_components/localized_date/full.html.twig', [
                        'date' => $event->getBeginAt(),
                    ])),
                ],
                'group' => $event->getGroup(),
                'address' => $event->getAddress(),
                'city' => $event->getCity(),
            ];
        }

        return new JsonResponse($this->serializer->serialize($events, 'json', ['groups' => 'search']), 200, [], true);
    }

    public function searchGroup(Request $request): JsonResponse
    {
        $term = (string) $request->query->get('q', '');
        $city = $this->cityRepo->findOneByUuid($request->query->get('c'));

        /** @var Group[] $data */
        $data = $this->groupRepo->search($city, $term);

        $groups = [];
        foreach ($data as $group) {
            $groups[] = [
                'name' => $group->getName(),
                'slug' => $group->getSlug(),
                'address' => $group->getAddress(),
                'city' => $group->getCity(),
                'followers' => $group->getMembersCount(),
            ];
        }

        return new JsonResponse($this->serializer->serialize($groups, 'json', ['groups' => 'search']), 200, [], true);
    }
}
