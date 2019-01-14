<?php

namespace App\Form;

use App\Entity\Actor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfileType extends AbstractType
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'actor.first_name',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'actor.last_name',
            ])
            ->add('birthday', DateType::class, [
                'label' => 'actor.birthday',
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'actor.gender',
                'placeholder' => 'select gender',
                'choices' => ['female', 'male', 'gender'],
            ])
            ->add('emailAddress', EmailType::class, [
                'label' => 'actor.email_address',
                'disabled' => true,
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'actor.password'],
                'second_options' => ['label' => 'actor.password_confirmation'],
                'required' => false,
            ])
        ;

        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
            $form = $event->getForm();
            /** @var Actor $actor */
            $actor = $form->getData();
            $plainPassword = $form->get('password')->getData();

            $actor->setPassword($this->encoder->encodePassword($actor, $plainPassword));
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
            'validation_groups' => ['profile'],
        ]);
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
