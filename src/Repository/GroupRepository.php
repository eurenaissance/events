<?php

namespace App\Repository;

use App\Entity\Actor;
use App\Entity\Group;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class GroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Group::class);
    }

    public function findOneBySlug(string $slug): ?Group
    {
        return $this
            ->createQueryBuilder('g')
            ->where('g.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function hasPendingGroup(Actor $animator): bool
    {
        return 0 !== $this
            ->createQueryBuilder('g')
            ->select('COUNT(g)')
            ->where('g.approvedAt IS NULL')
            ->andWhere('g.refusedAt IS NULL')
            ->andWhere('g.animator = :animator')
            ->setParameter('animator', $animator)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * For tests purpose only.
     */
    public function deleteAll(): void
    {
        $this->createQueryBuilder('g')->delete()->getQuery()->execute();
    }
}
