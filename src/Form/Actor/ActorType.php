<?php

namespace App\Form\Actor;

use App\Entity\Actor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActorType extends AbstractType
{
    private const BIRTHDAY_MIN_YEARS = 15;
    private const BIRTHDAY_MAX_YEARS = 120;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'actor.first_name',
                'empty_data' => '',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'actor.last_name',
                'empty_data' => '',
            ])
            ->add('birthday', BirthdayType::class, [
                'label' => 'actor.birthday',
                'widget' => 'choice',
                'years' => $options['years'],
                'placeholder' => [
                    'year' => 'AAAA',
                    'month' => 'MM',
                    'day' => 'JJ',
                ],
                'invalid_message' => 'common.date.invalid',
                'empty_data' => '',
            ])
            ->add('emailAddress', EmailType::class, [
                'label' => 'actor.email_address',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $currentYear = (int) date('Y');
        $years = range($currentYear - self::BIRTHDAY_MIN_YEARS, $currentYear - self::BIRTHDAY_MAX_YEARS);

        $resolver->setDefaults([
            'data_class' => Actor::class,
            'years' => array_combine($years, $years),
        ]);
    }
}
