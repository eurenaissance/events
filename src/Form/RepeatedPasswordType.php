<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RepeatedPasswordType extends AbstractType
{
    public const VALIDATION_GROUPS = ['password'];
    public const VALIDATION_GROUP_REQUIRED = 'password_required';

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'mapped' => false,
            'type' => PasswordType::class,
            'invalid_message' => 'common.password.mismatch',
            'first_options' => ['label' => 'common.password.label'],
            'second_options' => ['label' => 'common.password.confirmation'],
            'validation_groups' => self::VALIDATION_GROUPS,
            'constraints' => [
                new NotBlank([
                    'message' => 'common.password.not_blank',
                    'groups' => self::VALIDATION_GROUP_REQUIRED,
                ]),
                new Length([
                    'min' => 6,
                    'max' => 128,
                    'minMessage' => 'common.password.min_length',
                    'maxMessage' => 'common.password.max_length',
                    'groups' => self::VALIDATION_GROUPS,
                ]),
            ],
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
