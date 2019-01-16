<?php

namespace App\Repository;

use App\Entity\Actor;
use App\Entity\ActorResetPasswordToken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ActorResetPasswordTokenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActorResetPasswordToken::class);
    }

    public function findPendingToken(Actor $actor): ?ActorResetPasswordToken
    {
        return $this
            ->createQueryBuilder('token')
            ->where('token.actor = :actor')
            ->andWhere('token.expiredAt > :now')
            ->andWhere('token.consumedAt IS NULL')
            ->setParameters([
                'actor' => $actor,
                'now' => new \DateTime(),
            ])
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
