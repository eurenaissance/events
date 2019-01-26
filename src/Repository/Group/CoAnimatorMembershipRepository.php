<?php

namespace App\Repository\Group;

use App\Entity\Group\CoAnimatorMembership;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CoAnimatorMembershipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoAnimatorMembership::class);
    }
}
