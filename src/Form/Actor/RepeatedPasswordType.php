<?php

namespace App\Form\Actor;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepeatedPasswordType extends AbstractType
{
    private const VALIDATION_GROUPS = ['registration', 'reset_password', 'change_password'];

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'type' => PasswordType::class,
            'validation_groups' => static::VALIDATION_GROUPS,
            'invalid_message' => 'actor.password.mismatch',
        ]);
    }

    public function getParent()
    {
        return RepeatedType::class;
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
