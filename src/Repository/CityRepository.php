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

    public function findOneByUuid(?string $uuid): ?City
    {
        return $uuid ? $this->findOneBy(['uuid' => $uuid]) : null;
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

    public function search(string $name, string $preferedCountry, int $limit = 10): iterable
    {
        $qb = $this->createQueryBuilder('c');
        $qb->addSelect('(CASE WHEN c.country = :preferedCountry THEN 1 ELSE 0 END) AS HIDDEN isPreferedCountry');
        $qb->setParameter('preferedCountry', $preferedCountry);

        $scoreQuery = [];

        $keywords = explode(' ', $name);
        foreach ($keywords as $i => $keyword) {
            // Start with => score 3
            $scoreQuery[] = '(CASE WHEN LOWER(c.name) LIKE :ks'.$i.' THEN 3 ELSE 0 END)';
            $qb->setParameter('ks'.$i, strtolower($keyword).'%');

            // Contains => score 1
            $scoreQuery[] = '(CASE WHEN LOWER(c.name) LIKE :kc'.$i.' THEN 1 ELSE 0 END)';
            $qb->setParameter('kc'.$i, '%'.strtolower($keyword).'%');
        }

        $qb->addSelect('('.implode(' + ', $scoreQuery).') AS score');
        $qb->addOrderBy('score', 'DESC');
        $qb->addOrderBy('isPreferedCountry', 'DESC');
        $qb->addOrderBy('c.name', 'ASC');
        $qb->setMaxResults($limit);

        $data = $qb->getQuery()->getResult();
        $results = [];

        foreach ($data as $item) {
            if ($item['score']) {
                $results[] = $item[0];
            }
        }

        return $results;
    }
}
