<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ActorAdmin extends AbstractAdmin
{
    public function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
    }

    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);

        if ($object) {
            $list['switch_user'] = ['template' => 'admin/actor/_action_switch_user.html.twig'];
        }

        return $list;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('emailAddress', EmailType::class, [
                'label' => 'Email address',
                'disabled' => true,
            ])
            ->add('firstName', TextType::class, [
                'label' => 'First name',
                'disabled' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last name',
                'disabled' => true,
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
