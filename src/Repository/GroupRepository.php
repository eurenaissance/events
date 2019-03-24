<?php

namespace App\Repository;

use App\Entity\Actor;
use App\Entity\Group;
use App\Geography\GeographyInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

class GroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Group::class);
    }

    public function findHomeMostActive(int $maxResults = 3): iterable
    {
        $mostActiveGroups = $this->createApprovedQueryBuilder()
            ->select('g.id', 'COUNT(e) AS count')
            ->leftJoin('g.events', 'e')
            ->groupBy('g.id')
            ->orderBy('count', 'DESC')
            ->setMaxResults($maxResults)
            ->getQuery()
            ->getArrayResult()
        ;

        if (!$mostActiveGroups) {
            return [];
        }

        $qb = $this->createApprovedQueryBuilder();

        return $qb->select('g', 'a', 'e', 'cm', 'fm')
            ->leftJoin('g.events', 'e')
            ->leftJoin('g.animator', 'a')
            ->leftJoin('g.coAnimatorMemberships', 'cm')
            ->leftJoin('g.followerMemberships', 'fm')
            ->where($qb->expr()->in('g.id', array_column($mostActiveGroups, 'id')))
            ->getQuery()
            ->getResult()
        ;
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

    public function findApprovedBySlug(string $slug): ?Group
    {
        return $this
            ->createApprovedQueryBuilder('g')
            ->andWhere('g.slug = :slug')
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

    public function findClosestFrom(GeographyInterface $entity, int $maxResults = 3, ?int $maxDistance = 150): array
    {
        if (!$coordinates = $entity->getCoordinates()) {
            throw new \InvalidArgumentException('Cannot find closest groups from entity with no coordinates.');
        }

        $qb = $this
            ->createApprovedQueryBuilder('g')
            ->innerJoin('g.city', 'c')
            ->addSelect('ST_Distance_Sphere(c.coordinates, :coordinates) as HIDDEN distance')
            ->setParameter('coordinates', $coordinates, 'point')
            ->orderBy('distance', 'ASC')
            ->setMaxResults($maxResults)
        ;

        if ($maxDistance) {
            $qb->andWhere('ST_Distance_Sphere(c.coordinates, :coordinates) <= :maxDistance')
                ->setParameter('maxDistance', $maxDistance * 1000);
        }

        return $qb->getQuery()->getResult();
    }

    public function findWithoutFilters(array $criteria): array
    {
        $filters = $this->getEntityManager()->getFilters();
        if ($enabled = $filters->isEnabled('refused')) {
            $filters->disable('refused');
        }

        $groups = $this->findBy($criteria);

        if ($enabled) {
            $filters->enable('refused');
        }

        return $groups;
    }

    private function createApprovedQueryBuilder(string $alias = 'g'): QueryBuilder
    {
        return $this
            ->createQueryBuilder($alias)
            ->andWhere("$alias.approvedAt IS NOT NULL")
            ->andWhere("$alias.refusedAt IS NULL")
        ;
    }

    public function search(?GeographyInterface $around, string $term, int $maxDistance = 150, int $limit = 30): iterable
    {
        $qb = $this->createQueryBuilder('g');

        if ($around) {
            $qb->addSelect('ST_Distance_Sphere(g.coordinates, :coordinates) as HIDDEN distance')
                ->andWhere('ST_Distance_Sphere(g.coordinates, :coordinates) <= :maxDistance')
                ->setParameter('coordinates', $around->getCoordinates(), 'point')
                ->setParameter('maxDistance', $maxDistance * 1000)
                ->addOrderBy('distance', 'ASC')
            ;
        }

        $qb->setMaxResults($limit);

        $scoreQuery = [];

        if ($term) {
            $keywords = explode(' ', $term);
            foreach ($keywords as $i => $keyword) {
                // Start with => score 3
                $scoreQuery[] = '(CASE WHEN LOWER(g.name) LIKE :ks'.$i.' THEN 3 ELSE 0 END)';
                $qb->setParameter('ks'.$i, strtolower($keyword).'%');

                // Contains => score 1
                $scoreQuery[] = '(CASE WHEN LOWER(g.name) LIKE :kc'.$i.' THEN 1 ELSE 0 END)';
                $qb->setParameter('kc'.$i, '%'.strtolower($keyword).'%');
            }

            $qb->addSelect('('.implode(' + ', $scoreQuery).') AS score');
        } else {
            $qb->addSelect('1 AS score');
        }

        $qb->addOrderBy('score', 'DESC');
        $qb->addOrderBy('g.name', 'ASC');

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
