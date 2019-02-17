<?php

namespace App\Form\Actor;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmailRequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emailAddress', EmailType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(['message' => 'actor.email_address.not_blank']),
                    new Email(['message' => 'actor.email_address.invalid']),
                ],
            ])
        ;
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
