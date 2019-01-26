<?php

namespace App\Repository\Actor;

use App\Entity\Actor;
use App\Entity\Actor\AbstractToken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

abstract class AbstractTokenRepository extends ServiceEntityRepository
{
    public function findPendingToken(Actor $actor): ?AbstractToken
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
