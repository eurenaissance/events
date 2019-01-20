<?php

namespace App\Repository;

use App\Entity\ActorResetPasswordToken;
use Doctrine\Common\Persistence\ManagerRegistry;

class ActorResetPasswordTokenRepository extends ActorTokenRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActorResetPasswordToken::class);
    }
}
