<?php

namespace App\Form\Event;

use App\Entity\Event;
use App\Form\DataTransformer\CityToUuidTransformer;
use App\Form\Type\CityType;
use App\Form\Type\CountryType;
use App\Util\Slugify;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    private $slugify;
    private $cityToUuidTransformer;

    public function __construct(Slugify $slugify, CityToUuidTransformer $cityToUuidTransformer)
    {
        $this->slugify = $slugify;
        $this->cityToUuidTransformer = $cityToUuidTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'empty_data' => '',
            ])
            ->add('description', TextareaType::class, [
                'empty_data' => '',
            ])
            ->add('beginAt', DateTimeType::class, [
                'widget' => 'choice',
                'years' => $options['years'],
                'minutes' => [0, 15, 30, 45],
                'placeholder' => [
                    'year' => 'base.date.year',
                    'month' => 'base.date.month',
                    'day' => 'base.date.day',
                ],
                'empty_data' => null,
                'invalid_message' => 'common.date.invalid',
            ])
            ->add('finishAt', DateTimeType::class, [
                'widget' => 'choice',
                'years' => $options['years'],
                'minutes' => [0, 15, 30, 45],
                'placeholder' => [
                    'year' => 'base.date.year',
                    'month' => 'base.date.month',
                    'day' => 'base.date.day',
                ],
                'empty_data' => null,
                'invalid_message' => 'common.date.invalid',
            ])
            ->add('address', TextType::class, [
                'required' => false,
                'empty_data' => '',
            ])
            ->add('zipCode', TextType::class, [
                'mapped' => false,
            ])
            ->add('country', CountryType::class, [
                'mapped' => false,
            ])
            ->add('city', CityType::class, [
                'country_field' => 'country',
                'zip_code_field' => 'zipCode',
            ])
            ->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
                $form = $event->getForm();

                /** @var Event $groupEvent */
                $groupEvent = $event->getData();

                $form->get('zipCode')->setData($groupEvent->getZipCode());
                $form->get('country')->setData($groupEvent->getCountry());
            })
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                /** @var Event $groupEvent */
                $groupEvent = $event->getData();

                $this->slugify->createSlug($groupEvent);
            })
        ;

        $builder->get('city')->addModelTransformer($this->cityToUuidTransformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => Event::class,
                'years' => $this->getDatesYears(),
            ])
        ;
    }

    private function getDatesYears(): array
    {
        $years = range((int) date('Y'), (int) date('Y', strtotime('+5 years')));

        return array_combine($years, $years);
    }
}
