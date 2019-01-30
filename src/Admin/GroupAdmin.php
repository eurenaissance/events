<?php

namespace App\Admin;

use App\Entity\Actor;
use App\Entity\Group;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\DoctrineORMAdminBundle\Filter\CallbackFilter;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;
use Sonata\DoctrineORMAdminBundle\Filter\ModelAutocompleteFilter;
use Sonata\Form\Type\DateRangePickerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class GroupAdmin extends AbstractAdmin
{
    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);

        if (!$object instanceof Group) {
            return $list;
        }

        if (!$object->isApproved()) {
            $list['approve'] = ['template' => 'admin/group/_action_approve.html.twig'];
        }

        if (!$object->isRefused()) {
            $list['refuse'] = ['template' => 'admin/group/_action_refuse.html.twig'];
        }

        return $list;
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->with('General informations', ['class' => 'col-md-8'])
                ->add('name', null, [
                    'label' => 'Name',
                ])
                ->add('address', null, [
                    'label' => 'Address',
                    'virtual_field' => true,
                    'template' => 'admin/address/_show.html.twig',
                ])
                ->add('animators', null, [
                    'label' => 'Animators',
                    'template' => 'admin/group/_show_animators.html.twig',
                ])
            ->end()
            ->with('System informations', ['class' => 'col-md-4'])
                ->add('status', null, [
                    'label' => 'Status',
                    'template' => 'admin/group/_show_status.html.twig',
                ])
                ->add('createdAt', null, [
                    'label' => 'Created at',
                ])
                ->add('approvedAt', null, [
                    'label' => 'Approved at',
                ])
                ->add('refusedAt', null, [
                    'label' => 'Refused at',
                ])
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $range = range(2018, (int) date('Y'));
        $years = array_combine($range, $range);

        $filter
            ->add('name', CallbackFilter::class, [
                'label' => 'Name',
                'show_filter' => true,
                'advanced_filter' => false,
                'callback' => [$this, 'applyNameFilter'],
            ])
            ->add('animator', ModelAutocompleteFilter::class, [
                'label' => 'Animator or Co-Animator',
                'show_filter' => true,
                'operator_type' => HiddenType::class,
                'advanced_filter' => false,
            ], ModelAutocompleteType::class, [
                'property' => ['emailAddress', 'fullName'],
                'to_string_callback' => function (Actor $actor) {
                    return sprintf('%s (%s)', $actor->getFullName(), $actor->getEmailAddress());
                },
            ])
            ->add('createdAt', DateRangeFilter::class, [
                'label' => 'Created at',
                'field_type' => DateRangePickerType::class,
                'field_options' => [
                    'field_options_start' => [
                        'datepicker_use_button' => false,
                        'years' => $years,
                    ],
                    'field_options_end' => [
                        'datepicker_use_button' => false,
                        'years' => $years,
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
            ->add('animator', null, [
                'label' => 'Animator',
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
            ->add('createdAt', null, [
                'label' => 'Created at',
            ])
            ->add('membersCount', null, [
                'label' => 'Members',
            ])
            ->add('status', null, [
                'label' => 'Status',
                'template' => 'admin/group/_list_status.html.twig',
            ])
            ->add('_action', null, [
                'virtual_field' => true,
                'actions' => [
                    'approve' => [
                        'template' => 'admin/group/_list_approve.html.twig',
                    ],
                    'refuse' => [
                        'template' => 'admin/group/_list_refuse.html.twig',
                    ],
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
