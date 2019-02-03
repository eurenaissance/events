<?php

namespace App\Repository;

use App\Entity\Event;
use App\Entity\Group;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function findOneBySlug(string $slug): ?Event
    {
        return $this
            ->createQueryBuilder('e')
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
