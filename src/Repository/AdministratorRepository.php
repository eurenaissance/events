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

    public function findOneByEmail(string $email): ?Administrator
    {
        return $this
            ->createQueryBuilder('a')
            ->where('a.emailAddress = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function hasAdministrator(): bool
    {
        return 0 !== $this->count([]);
    }

    /**
     * For tests purpose only.
     */
    public function deleteAll(): void
    {
        $this->createQueryBuilder('a')->delete()->getQuery()->execute();
    }
}
