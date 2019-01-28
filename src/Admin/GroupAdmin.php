<?php

namespace App\Admin;

use App\Entity\Group;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;
use Sonata\Form\Type\DateRangeType;

class GroupAdmin extends AbstractAdmin
{
    public function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('edit')
            ->remove('delete')
        ;
    }

    /**
     * @param Group|null $object
     *
     * @return array
     */
    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);

        if (!$object) {
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
            ->add('address')
            ->add('city')
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
                'label' => 'Name',
            ])
            ->add('city', null, [
                'label' => 'City',
            ])
            ->add('animator', null, [
                'label' => 'Animator',
                'route' => ['name' => 'show'],
            ])
            ->add('createdAt', null, [
                'label' => 'Created at',
            ])
            ->add('status', null, [
                'label' => 'Status',
                'template' => 'admin/group/_list_status.html.twig',
            ])
        ;
    }
}
