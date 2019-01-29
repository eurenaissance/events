<?php

namespace App\Admin;

use App\Entity\City;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\DoctrineORMAdminBundle\Filter\CallbackFilter;
use Sonata\DoctrineORMAdminBundle\Filter\ChoiceFilter;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class CityAdmin extends AbstractAdmin
{
    public function configureRoutes(RouteCollection $collection)
    {
        $collection->clearExcept(['list']);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('nameOrZipCode', CallbackFilter::class, [
                'label' => 'Name or zip code',
                'show_filter' => true,
                'advanced_filter' => false,
                'callback' => [$this, 'applyNameOrZipCodeFilter'],
            ])
            ->add('country', ChoiceFilter::class, [
                'label' => 'Country',
            ], CountryType::class, [
                'choices' => ['FR', 'IT'],
            ]);
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name', null, [
                'label' => 'Name',
            ])
            ->add('zipCode', null, [
                'label' => 'Zip code',
            ])
            ->add('country', null, [
                'label' => 'Country',
                'template' => 'admin/address/_list_country.html.twig',
            ])
        ;
    }

    /**
     * @param ProxyQuery|\Doctrine\ORM\QueryBuilder $queryBuilder
     */
    public function applyNameOrZipCodeFilter(ProxyQuery $queryBuilder, string $alias, string $field, array $value): bool
    {
        if (!$value['value']) {
            return false;
        }

        $canonicalName = mb_strtolower($value['value']);
        $canonicalZipCode = City::canonicalizeZipCode($value['value']);

        // AND WHERE (LOWER(c.name) LIKE '%:canonicalName%' OR LOWER(c.name) LIKE '%:canonicalZipCode%')
        $queryBuilder->andWhere($queryBuilder->expr()->orX(
            $queryBuilder->expr()->like(
                $queryBuilder->expr()->lower("$alias.name"),
                $queryBuilder->expr()->literal("%$canonicalName%")
            ),
            $queryBuilder->expr()->like(
                "$alias.canonicalZipCode",
                $queryBuilder->expr()->literal("%$canonicalZipCode%")
            )
        ));

        return true;
    }
}
