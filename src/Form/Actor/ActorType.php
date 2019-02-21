<?php

namespace App\Form\Actor;

use App\Entity\Actor;
use App\Form\DataTransformer\CityToUuidTransformer;
use App\Form\Type\CityType;
use App\Form\Type\CountryType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActorType extends AbstractType
{
    private const BIRTHDAY_MIN_YEARS = 15;
    private const BIRTHDAY_MAX_YEARS = 120;

    private $cityToUuidTransformer;

    public function __construct(CityToUuidTransformer $cityToUuidTransformer)
    {
        $this->cityToUuidTransformer = $cityToUuidTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'empty_data' => '',
            ])
            ->add('lastName', TextType::class, [
                'empty_data' => '',
            ])
            ->add('birthday', BirthdayType::class, [
                'widget' => 'choice',
                'years' => $options['years'],
                'placeholder' => [
                    'year' => 'base.date.year',
                    'month' => 'base.date.month',
                    'day' => 'base.date.day',
                ],
                'empty_data' => null,
                'format' => 'ddMMMMyyyy',
                'invalid_message' => 'common.date.invalid',
            ])
            ->add('emailAddress', EmailType::class)
            ->add('country', CountryType::class, [
                'mapped' => false,
            ])
            ->add('address', TextType::class, [
                'required' => false,
                'empty_data' => '',
            ])
            ->add('zipCode', TextType::class, [
                'mapped' => false,
            ])
            ->add('city', CityType::class, [
                'country_field' => 'country',
                'zip_code_field' => 'zipCode',
            ])
        ;

        $builder->get('city')->addModelTransformer($this->cityToUuidTransformer);

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            /** @var Actor $actor */
            $actor = $event->getData();

            $form->get('zipCode')->setData($actor->getZipCode());
            $form->get('country')->setData($actor->getCountry());
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
            'years' => self::getBirthdayYears(),
        ]);
    }

    public static function getBirthdayYears(): array
    {
        $currentYear = (int) date('Y');
        $years = range($currentYear - self::BIRTHDAY_MIN_YEARS, $currentYear - self::BIRTHDAY_MAX_YEARS);

        return array_combine($years, $years);
    }
}
