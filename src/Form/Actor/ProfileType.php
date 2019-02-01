<?php

namespace App\Form\Actor;

use App\Entity\Actor;
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
                'choices' => Actor::GENDERS,
                'choice_label' => function ($choice) {
                    return "common.gender.$choice";
                },
                'empty_data' => '',
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
