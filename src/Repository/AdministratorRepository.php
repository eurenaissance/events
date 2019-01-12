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

    /**
     * Loads the user for the given username.
     *
     * This method must return null if the user is not found.
     *
     * @param string $username The username
     *
     * @return UserInterface|null
     */
    public function loadUserByUsername($username)
    {
        $query = $this
            ->createQueryBuilder('a')
            ->where('a.emailAddress = :username')
            ->setParameter('username', $username)
            ->getQuery()
        ;

        return $query->getOneOrNullResult();
    }
}
