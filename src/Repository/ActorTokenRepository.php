<?php

namespace App\Repository;

use App\Entity\Actor;
use App\Entity\ActorToken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

abstract class ActorTokenRepository extends ServiceEntityRepository
{
    public function findPendingToken(Actor $actor): ?ActorToken
    {
        return $this
            ->createQueryBuilder('token')
            ->innerJoin('token.actor', 'actor')
            ->addSelect('actor')
            ->where('actor = :actor')
            ->andWhere('token.expiredAt > :now')
            ->andWhere('token.consumedAt IS NULL')
            ->setParameters([
                'actor' => $actor,
                'now' => new \DateTime('now'),
            ])
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
