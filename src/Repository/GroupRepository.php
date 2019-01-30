<?php

namespace App\Repository;

use App\Entity\Actor;
use App\Entity\Group;
use App\Geocoder\GeocodableInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

class GroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Group::class);
    }

    public function findOneBySlug(string $slug): ?Group
    {
        return $this
            ->createQueryBuilder('g')
            ->where('g.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function hasPendingGroup(Actor $animator): bool
    {
        return 0 !== $this
            ->createQueryBuilder('g')
            ->select('COUNT(g)')
            ->where('g.approvedAt IS NULL')
            ->andWhere('g.refusedAt IS NULL')
            ->andWhere('g.animator = :animator')
            ->setParameter('animator', $animator)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    public function findClosestFrom(GeocodableInterface $entity, int $maxResults = 3, int $maxDistance = 150): array
    {
        if (!$coordinates = $entity->getCoordinates()) {
            throw new \InvalidArgumentException('Cannot find closest groups from entity with no coordinates.');
        }

        return $this
            ->createConfirmedQueryBuilder('g')
            ->innerJoin('g.city', 'c')
            ->addSelect('ST_Distance_Sphere(c.coordinates, :coordinates) as HIDDEN distance')
            ->andWhere('ST_Distance_Sphere(c.coordinates, :coordinates) <= :maxDistance')
            ->setParameter('coordinates', $coordinates, 'point')
            ->setParameter('maxDistance', $maxDistance * 1000)
            ->orderBy('distance', 'ASC')
            ->setMaxResults($maxResults)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findWithoutFilters(array $criteria): array
    {
        $filters = $this->getEntityManager()->getFilters();
        if ($filters->isEnabled('refused')) {
            $filters->disable('refused');
        }

        $groups = $this->findBy($criteria);

        $filters->enable('refused');

        return $groups;
    }

    private function createConfirmedQueryBuilder(string $alias = 'g'): QueryBuilder
    {
        return $this
            ->createQueryBuilder($alias)
            ->where('g.refusedAt IS NULL')
            ->andWhere('g.approvedAt IS NOT NULL')
        ;
    }
}
