<?php

namespace App\Repository;

use App\Entity\Event;
use App\Entity\Group;
use App\Geography\GeographyInterface;
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

    public function createApprovedQueryBuilder($alias)
    {
        return $this
            ->createQueryBuilder($alias)
            ->addSelect('g')
            ->leftJoin('e.group', 'g')
            ->where('g.approvedAt IS NOT NULL')
            ->andWhere('g.refusedAt IS NULL')
        ;
    }

    public function findHomeMap(): iterable
    {
        $events = $this
            ->createApprovedQueryBuilder('e')
            ->select('e.slug', 'e.name', 'e.beginAt', 'g.name AS group', 'e.coordinates', 'e.coordinatesAccuracy')
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
            ->createApprovedQueryBuilder('e')
            ->leftJoin('e.creator', 'c')
            ->addSelect('c')
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
            ->createApprovedQueryBuilder('e')
            ->leftJoin('e.creator', 'c')
            ->addSelect('c')
            ->where('e.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findUpcoming(Group $group = null, int $maxResults = 10): array
    {
        $qb = $this
            ->createApprovedQueryBuilder('e')
            ->leftJoin('e.creator', 'c')
            ->addSelect('c')
            ->andWhere('e.finishAt > CURRENT_TIMESTAMP()')
            ->orderBy('e.beginAt', 'ASC')
            ->setMaxResults($maxResults);

        if (null !== $group) {
            $qb
                ->where('e.group = :group')
                ->setParameter('group', $group);
        }

        return $qb->getQuery()->getResult();
    }

    public function findFinished(Group $group, int $maxResults = 10, int $page = 1): Paginator
    {
        $qb = $this
            ->createApprovedQueryBuilder('e')
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

    public function search(GeographyInterface $around, string $term, int $maxDistance = 150, int $limit = 30): iterable
    {
        $qb = $this->createApprovedQueryBuilder('e');
        $qb->addSelect('ST_Distance_Sphere(e.coordinates, :coordinates) as HIDDEN distance')
            ->andWhere('ST_Distance_Sphere(e.coordinates, :coordinates) <= :maxDistance')
            ->setParameter('coordinates', $around->getCoordinates(), 'point')
            ->setParameter('maxDistance', $maxDistance * 1000)
            ->andWhere('e.beginAt > CURRENT_TIMESTAMP()')
            ->addOrderBy('distance', 'ASC')
            ->setMaxResults($limit)
        ;

        $scoreQuery = [];

        if ($term) {
            $keywords = explode(' ', $term);
            foreach ($keywords as $i => $keyword) {
                // Start with => score 3
                $scoreQuery[] = '(CASE WHEN LOWER(e.name) LIKE :ks'.$i.' THEN 3 ELSE 0 END)';
                $qb->setParameter('ks'.$i, strtolower($keyword).'%');

                // Contains => score 1
                $scoreQuery[] = '(CASE WHEN LOWER(e.name) LIKE :kc'.$i.' THEN 1 ELSE 0 END)';
                $qb->setParameter('kc'.$i, '%'.strtolower($keyword).'%');
            }

            $qb->addSelect('('.implode(' + ', $scoreQuery).') AS score');
        } else {
            $qb->addSelect('1 AS score');
        }

        $qb->addOrderBy('score', 'DESC');
        $qb->addOrderBy('e.beginAt', 'ASC');
        $qb->addOrderBy('e.name', 'ASC');

        $data = $qb->getQuery()->getResult();
        $results = [];

        foreach ($data as $item) {
            if ($item['score']) {
                $results[] = $item[0];
            }
        }

        return $results;
    }
}
