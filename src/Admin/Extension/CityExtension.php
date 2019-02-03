<?php

namespace App\Admin\Extension;

use App\Entity\City;
use Sonata\AdminBundle\Admin\AbstractAdminExtension;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\DoctrineORMAdminBundle\Filter\ModelAutocompleteFilter;

class CityExtension extends AbstractAdminExtension
{
    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('city', ModelAutocompleteFilter::class, [
                'label' => 'City',
                'show_filter' => true,
                'advanced_filter' => false,
                'field_options' => [
                    'property' => ['nameOrZipCode'],
                    'to_string_callback' => function (City $city) {
                        return sprintf(
                            '%s (%s - %s)',
                            $city->getName(),
                            $city->getZipCode(),
                            $city->getCountry()
                        );
                    },
                ],
            ])
        ;
    }
}
