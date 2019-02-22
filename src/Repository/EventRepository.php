<?php

namespace App\Repository;

use App\Entity\Event;
use App\Entity\Group;
use CrEOF\Spatial\PHP\Types\Geography\Point;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function findHomeMap(): iterable
    {
        $events = $this
            ->createQueryBuilder('e')
            ->select('e.slug', 'e.name', 'e.beginAt', 'g.name AS group', 'e.coordinates', 'e.coordinatesAccuracy')
            ->leftJoin('e.group', 'g')
            ->where('g.approvedAt IS NOT NULL')
            ->andWhere('g.refusedAt IS NULL')
            ->andWhere('e.beginAt > CURRENT_TIMESTAMP()')
            ->orderBy('e.beginAt', 'ASC')
            ->getQuery()
            ->getArrayResult()
        ;

        $map = [
            'accuracy' => 'high',
            'blocks' => [],
        ];

        foreach ($events as $event) {
            if ('low' === $event['coordinatesAccuracy']) {
                $map['accuracy'] = 'low';
            }

            $slug = $event['slug'];

            /** @var \DateTime $beginAt */
            $beginAt = $event['beginAt'];

            /** @var Point $coords */
            $coords = $event['coordinates'];
            $blockKey = $coords->getLatitude().'-'.$coords->getLongitude();

            if (!isset($map['blocks'][$blockKey])) {
                $map['blocks'][$blockKey] = [
                    'lat' => $coords->getLatitude(),
                    'lng' => $coords->getLongitude(),
                    'events' => [],
                ];
            }

            if (count($map['blocks'][$blockKey]['events']) >= 3) {
                continue;
            }

            $map['blocks'][$blockKey]['events'][$slug] = [
                'name' => $event['name'],
                'group' => $event['group'],
                'date' => $beginAt->format(\DateTime::ATOM),
            ];
        }

        $map['blocks'] = array_values($map['blocks']);

        return $map;
    }

    public function findHomeUpcoming(int $maxResults = 3): iterable
    {
        return $this
            ->createQueryBuilder('e')
            ->leftJoin('e.group', 'g')
            ->addSelect('g')
            ->leftJoin('e.creator', 'c')
            ->addSelect('c')
            ->where('g.approvedAt IS NOT NULL')
            ->andWhere('g.refusedAt IS NULL')
            ->andWhere('e.beginAt > CURRENT_TIMESTAMP()')
            ->orderBy('e.beginAt', 'ASC')
            ->setMaxResults($maxResults)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySlug(string $slug): ?Event
    {
        return $this
            ->createQueryBuilder('e')
            ->leftJoin('e.group', 'g')
            ->addSelect('g')
            ->leftJoin('e.creator', 'c')
            ->addSelect('c')
            ->where('e.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findUpcoming(Group $group, int $maxResults = 10): array
    {
        return $this
            ->createQueryBuilder('e')
            ->leftJoin('e.group', 'g')
            ->addSelect('g')
            ->leftJoin('e.creator', 'c')
            ->addSelect('c')
            ->where('e.group = :group')
            ->andWhere('e.finishAt > CURRENT_TIMESTAMP()')
            ->orderBy('e.beginAt', 'ASC')
            ->setParameter('group', $group)
            ->setMaxResults($maxResults)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findFinished(Group $group, int $maxResults = 10, int $page = 1): Paginator
    {
        $qb = $this
            ->createQueryBuilder('e')
            ->leftJoin('e.group', 'g')
            ->addSelect('g')
            ->leftJoin('e.creator', 'c')
            ->addSelect('c')
            ->where('e.group = :group')
            ->andWhere('e.finishAt <= CURRENT_TIMESTAMP()')
            ->orderBy('e.finishAt', 'DESC')
            ->setParameter('group', $group)
            ->setFirstResult($maxResults * ($page - 1))
            ->setMaxResults($maxResults)
        ;

        return new Paginator($qb);
    }
}
