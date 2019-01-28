<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class ActorAdmin extends AbstractAdmin
{
    public function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('edit')
            ->remove('delete')
        ;
    }

    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);

        if ($object) {
            $list['switch_user'] = ['template' => 'admin/actor/_action_switch_user.html.twig'];
        }

        return $list;
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('emailAddress')
            ->add('firstName')
            ->add('lastName')
            ->add('gender')
            ->add('address')
            ->add('city')
            ->add('city.zipCode')
            ->add('city.country')
            ->add('animatedGroups', null, [
                'route' => ['name' => 'show'],
            ])
            ->add('coAnimatorMemberships', null, [
                'template' => 'admin/actor/_show_co_animator_memberships.html.twig',
            ])
            ->add('followerMemberships', null, [
                'template' => 'admin/actor/_show_follower_memberships.html.twig',
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('emailAddress', null, [
                'label' => 'Email address',
                'show_filter' => true,
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('emailAddress', null, [
                'label' => 'Email address',
            ])
            ->add('firstName', null, [
                'label' => 'First name',
            ])
            ->add('lastName', null, [
                'label' => 'Last name',
            ])
            ->add('_action', null, [
                'virtual_field' => true,
                'actions' => [
                    'switch_user' => [
                        'template' => 'admin/actor/_list_switch_user.html.twig',
                    ],
                    'edit' => [],
                ],
            ])
        ;
    }
}
