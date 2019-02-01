<?php

namespace App\Repository\Actor;

use App\Entity\Actor\ResetPasswordToken;
use Doctrine\Common\Persistence\ManagerRegistry;

class ResetPasswordTokenRepository extends AbstractTokenRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResetPasswordToken::class);
    }
}
