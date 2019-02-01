<?php

namespace App\Form\Actor;

use App\Entity\Actor;
use App\Form\EventListener\PasswordEncoderListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PasswordType extends AbstractType
{
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
        $resolver->setDefaults([
            'data_class' => Actor::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
