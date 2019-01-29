<?php

namespace App\Admin;

use App\Entity\Group;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;
use Sonata\Form\Type\DateRangeType;

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
            ->add('name')
            ->add('address', null, [
                'virtual_field' => true,
                'template' => 'admin/address/_show.html.twig',
            ])
            ->add('animator', null, [
                'route' => ['name' => 'show'],
            ])
            ->add('status')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $range = range(2018, (int) date('Y'));
        $years = array_combine($range, $range);

        $filter
            ->add('name', null, [
                'label' => 'Name',
                'show_filter' => true,
            ])
            ->add('createdAt', DateRangeFilter::class, [
                'label' => 'Created at',
                'field_type' => DateRangeType::class,
                'field_options' => [
                    'field_options_start' => ['years' => $years],
                    'field_options_end' => ['years' => $years],
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
                'sortable' => true,
                'sort_field_mapping' => ['fieldName' => 'id'],
                'sort_parent_association_mappings' => [],
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
}
