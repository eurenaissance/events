<?php

namespace App\Repository;

use App\Entity\Actor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ActorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actor::class);
    }

    public function loadActor(string $email): ?Actor
    {
        return $this
            ->createQueryBuilder('a')
            ->select('a', 'c', 'ag', 'cam', 'fm')
            ->leftJoin('a.city', 'c')
            ->leftJoin('a.animatedGroups', 'ag')
            ->leftJoin('a.coAnimatorMemberships', 'cam')
            ->leftJoin('a.followerMemberships', 'fm')
            ->where('a.emailAddress = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByEmail(string $email): ?Actor
    {
        return $this
            ->createQueryBuilder('a')
            ->where('a.emailAddress = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByUuid(string $uuid): ?Actor
    {
        return $this
            ->createQueryBuilder('a')
            ->where('a.uuid = :uuid')
            ->setParameter('uuid', $uuid)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * For tests purpose only.
     */
    public function deleteAll(): void
    {
        $this->createQueryBuilder('a')->delete()->getQuery()->execute();
    }
}
