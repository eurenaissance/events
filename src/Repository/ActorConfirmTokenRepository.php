<?php

namespace App\Repository;

use App\Entity\ActorConfirmToken;
use Doctrine\Common\Persistence\ManagerRegistry;

class ActorConfirmTokenRepository extends ActorTokenRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActorConfirmToken::class);
    }
}
