<?php

namespace App\Form\Actor;

use App\Entity\Actor;
use App\Form\EventListener\PasswordEncoderListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ChangePasswordType extends AbstractType
{
    private $passwordEncoderListener;

    public function __construct(PasswordEncoderListener $passwordEncoderListener)
    {
        $this->passwordEncoderListener = $passwordEncoderListener;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('currentPassword', PasswordType::class, [
                'mapped' => false,
                'constraints' => new UserPassword(['message' => 'actor.current_password.invalid']),
            ])
            ->addEventSubscriber($this->passwordEncoderListener);
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
