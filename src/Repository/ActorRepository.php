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
            ->select('a, cm, fm')
            ->leftJoin('a.coAnimatorMemberships', 'cm')
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
}
