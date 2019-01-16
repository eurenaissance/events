<?php

namespace App\Form\Actor;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    private const VALIDATION_GROUPS = ['profile'];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'label' => 'actor.gender',
                'placeholder' => 'common.gender.select',
                'choices' => [
                    'common.gender.female' => 'female',
                    'common.gender.male' => 'male',
                    'common.gender.other' => 'other',
                ],
            ])
        ;

        $builder->get('emailAddress')->setDisabled(true);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('validation_groups', static::VALIDATION_GROUPS);
    }

    public function getParent()
    {
        return ActorType::class;
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
