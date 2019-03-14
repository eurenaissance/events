<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TokenAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('token', null, [
                'label' => 'Token',
            ])
            ->add('created_at', 'datetime', [
                'label' => 'Created At',
                'date_format' => 'yyyy-MM-dd HH:mm:ss',
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('token', TextType::class, [
                'label' => 'token',
                'attr' => [
                    'readonly' => true,
                ],
            ])
            ->end()
        ;
    }
}
