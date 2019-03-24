<?php

namespace App\Search;

use App\Entity\City;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Twig\Environment;

class SearchEngine
{
    private $cityRepo;
    private $eventRepo;
    private $serializer;
    private $twig;

    public function __construct(EntityManagerInterface $manager, SerializerInterface $serializer, Environment $twig)
    {
        $this->cityRepo = $manager->getRepository(City::class);
        $this->eventRepo = $manager->getRepository(Event::class);
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
                    'month' => $this->twig->render('_components/localized_date/month.html.twig', [
                        'date' => $event->getBeginAt(),
                    ]),
                    'full' => $this->twig->render('_components/localized_date/full.html.twig', [
                        'date' => $event->getBeginAt(),
                    ]),
                ],
                'group' => $event->getGroup(),
                'address' => $event->getAddress(),
                'city' => $event->getCity(),
                'creatorName' => $event->getCreatorName(),
            ];
        }

        return new JsonResponse($this->serializer->serialize($events, 'json', ['groups' => 'search']), 200, [], true);
    }
}
