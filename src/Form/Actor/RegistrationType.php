<?php

namespace App\Form\Actor;

use App\Form\EventListener\PasswordEncoderListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    private const VALIDATION_GROUPS = ['registration', 'address'];

    private $passwordEncoderListener;

    public function __construct(PasswordEncoderListener $passwordEncoderListener)
    {
        $this->passwordEncoderListener = $passwordEncoderListener;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventSubscriber($this->passwordEncoderListener);
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
