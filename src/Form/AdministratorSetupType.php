<?php

namespace App\Form;

use App\Entity\Administrator;
use App\Form\EventListener\PasswordEncoderListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdministratorSetupType extends AbstractType
{
    private $passwordEncoderListener;

    public function __construct(PasswordEncoderListener $passwordEncoderListener)
    {
        $this->passwordEncoderListener = $passwordEncoderListener;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emailAddress', EmailType::class, [
                'label' => 'setup.form.email.label',
                'help' => 'setup.form.email.help',
            ])
            ->addEventSubscriber($this->passwordEncoderListener)
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
                /** @var Administrator $administrator */
                $administrator = $event->getData();

                $administrator->setRoles(['ROLE_SUPER_ADMIN']);
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Administrator::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
