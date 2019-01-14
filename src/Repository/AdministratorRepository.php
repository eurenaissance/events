<?php

namespace App\Repository;

use App\Entity\Administrator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class AdministratorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Administrator::class);
    }

    public function countAdministrators(): int
    {
        return $this->count([]);
    }

    public function deleteAll(): void
    {
        $this
            ->createQueryBuilder('a')
            ->delete()
            ->getQuery()
            ->execute()
        ;
    }
}
