<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ActorAdmin extends AbstractAdmin
{
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
