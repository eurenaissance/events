<?php

namespace App\Form\Actor;

use App\Entity\Actor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class PasswordType extends AbstractType
{
    private const VALIDATION_GROUPS = ['reset_password'];

    private $encoder;

    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoder = $encoderFactory->getEncoder(Actor::class);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', RepeatedPasswordType::class)
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
                $plainPassword = $event->getForm()->get('password')->getData();
                $encodedPassword = $this->encoder->encodePassword($plainPassword, null);

                $event->getData()->setPassword($encodedPassword);
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
            'validation_groups' => static::VALIDATION_GROUPS,
        ]);
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
