<?php

namespace App\Admin;

use App\Entity\Actor;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\DoctrineORMAdminBundle\Filter\CallbackFilter;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;
use Sonata\DoctrineORMAdminBundle\Filter\ModelAutocompleteFilter;
use Sonata\Form\Type\DateRangePickerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class EventAdmin extends AbstractAdmin
{
    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->with('General informations', ['class' => 'col-md-8'])
                ->add('name', null, [
                    'label' => 'Name',
                ])
                ->add('description', null, [
                    'label' => 'Description',
                ])
                ->add('beginAt', null, [
                    'label' => 'Begin at',
                ])
                ->add('finishAt', null, [
                    'label' => 'Finish at',
                ])
                ->add('address', null, [
                    'label' => 'Address',
                    'virtual_field' => true,
                    'template' => 'admin/address/_show.html.twig',
                ])
                ->add('creator', null, [
                    'label' => 'Creator',
                ])
            ->end()
            ->with('System informations', ['class' => 'col-md-4'])
                ->add('createdAt', null, [
                    'label' => 'Created at',
                ])
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $rangeCreatedAt = range(2018, (int) date('Y'));
        $yearsCreatedAt = array_combine($rangeCreatedAt, $rangeCreatedAt);
        $rangeDates = range(2018, (int) date('Y', strtotime('+5 years')));
        $yearsDates = array_combine($rangeDates, $rangeDates);

        $filter
            ->add('name', CallbackFilter::class, [
                'label' => 'Name',
                'show_filter' => true,
                'advanced_filter' => false,
                'callback' => [$this, 'applyNameFilter'],
            ])
            ->add('creator', ModelAutocompleteFilter::class, [
                'label' => 'Creator',
                'show_filter' => true,
                'operator_type' => HiddenType::class,
                'advanced_filter' => false,
            ], ModelAutocompleteType::class, [
                'property' => ['emailAddress', 'fullName'],
                'to_string_callback' => function (Actor $actor) {
                    return sprintf('%s (%s)', $actor->getFullName(), $actor->getEmailAddress());
                },
            ])
            ->add('beginAt', DateRangeFilter::class, [
                'label' => 'Begin at',
                'field_type' => DateRangePickerType::class,
                'field_options' => [
                    'field_options_start' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsDates,
                    ],
                    'field_options_end' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsDates,
                    ],
                ],
            ])
            ->add('finishAt', DateRangeFilter::class, [
                'label' => 'Finish at',
                'field_type' => DateRangePickerType::class,
                'field_options' => [
                    'field_options_start' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsDates,
                    ],
                    'field_options_end' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsDates,
                    ],
                ],
            ])
            ->add('createdAt', DateRangeFilter::class, [
                'label' => 'Created at',
                'field_type' => DateRangePickerType::class,
                'field_options' => [
                    'field_options_start' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsCreatedAt,
                    ],
                    'field_options_end' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsCreatedAt,
                    ],
                ],
            ])
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name', null, [
                'label' => 'Group name',
            ])
            ->add('creator', null, [
                'label' => 'Creator',
                'route' => ['name' => 'show'],
                'sortable' => true,
                'sort_field_mapping' => ['fieldName' => 'id'],
                'sort_parent_association_mappings' => [],
            ])
            ->add('address', null, [
                'label' => 'Address',
                'sortable' => false,
                'template' => 'admin/address/_list.html.twig',
            ])
            ->add('beginAt', null, [
                'label' => 'Begin at',
            ])
            ->add('finishAt', null, [
                'label' => 'Finish at',
            ])
            ->add('createdAt', null, [
                'label' => 'Created at',
            ])
            ->add('_action', null, [
                'virtual_field' => true,
                'actions' => [
                    'show' => [],
                ],
            ])
        ;
    }

    public function applyNameFilter(ProxyQuery $query, string $alias, string $field, array $value): bool
    {
        if (!$value['value']) {
            return false;
        }

        $canonicalName = mb_strtolower($value['value']);
        $qb = $query->getQueryBuilder();

        $qb->andWhere(
            $qb->expr()->like(
                $qb->expr()->lower("$alias.name"),
                $qb->expr()->literal("%$canonicalName%")
            )
        );

        return true;
    }
}
