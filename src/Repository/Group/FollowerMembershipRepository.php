<?php

namespace App\Repository\Group;

use App\Entity\Group;
use App\Entity\Group\FollowerMembership;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

class FollowerMembershipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FollowerMembership::class);
    }

    public function findFollowers(Group $group, int $maxResults = 10, int $page = 1): Paginator
    {
        $qb = $this
            ->createQueryBuilder('fm')
            ->where('fm.group = :group')
            ->orderBy('fm.createdAt', 'DESC')
            ->setParameter('group', $group)
            ->setFirstResult($maxResults * ($page - 1))
            ->setMaxResults($maxResults)
        ;

        return new Paginator($qb);
    }
}
