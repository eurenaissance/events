<?php

namespace App\Repository\Actor;

use App\Entity\Actor\ConfirmToken;
use Doctrine\Common\Persistence\ManagerRegistry;

class ConfirmTokenRepository extends AbstractTokenRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfirmToken::class);
    }
}
