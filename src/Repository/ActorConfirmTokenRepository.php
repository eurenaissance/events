<?php

namespace App\Repository;

use App\Entity\Actor;
use App\Entity\ActorConfirmToken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ActorConfirmTokenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActorConfirmToken::class);
    }

    public function findPendingToken(Actor $actor): ?ActorConfirmToken
    {
        return $this
            ->createQueryBuilder('token')
            ->innerJoin('token.actor', 'actor')
            ->addSelect('actor')
            ->where('actor = :actor')
            ->andWhere('token.consumedAt IS NULL')
            ->setParameter('actor', $actor)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
