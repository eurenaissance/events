<?php

namespace App\Admin\Extension;

use App\Entity\City;
use Sonata\AdminBundle\Admin\AbstractAdminExtension;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\DoctrineORMAdminBundle\Filter\ModelAutocompleteFilter;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class CityExtension extends AbstractAdminExtension
{
    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('city', ModelAutocompleteFilter::class, [
                'label' => 'City',
                'show_filter' => true,
                'operator_type' => HiddenType::class,
                'advanced_filter' => false,
            ], ModelAutocompleteType::class, [
                'property' => ['nameOrZipCode'],
                'to_string_callback' => function (City $city) {
                    return sprintf(
                        '%s (%s - %s)',
                        $city->getName(),
                        $city->getZipCode(),
                        $city->getCountry()
                    );
                },
            ])
        ;
    }
}
