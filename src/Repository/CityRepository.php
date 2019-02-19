<?php

namespace App\Repository;

use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method City|null find($id, $lockMode = null, $lockVersion = null)
 * @method City|null findOneBy(array $criteria, array $orderBy = null)
 * @method City[]    findAll()
 * @method City[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, City::class);
    }

    public function findOneByUuid(string $uuid): ?City
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }

    /**
     * @param string $country
     * @param string $zipCode
     *
     * @return City[]
     */
    public function findByZipCode(string $country, string $zipCode): iterable
    {
        return $this->createQueryBuilder('c')
            ->where('c.country = :country')
            ->setParameter('country', strtoupper($country))
            ->andWhere(':zipCode LIKE CONCAT(c.canonicalZipCode, \'%\')')
            ->setParameter('zipCode', City::canonicalizeZipCode($zipCode))
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
}
