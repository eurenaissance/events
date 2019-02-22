<?php

namespace App\Form\Group;

use App\Entity\Group;
use App\Form\DataTransformer\CityToUuidTransformer;
use App\Form\Type\CityType;
use App\Form\Type\CountryType;
use App\Util\Slugify;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupType extends AbstractType
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
                /** @var Group $group */
                $group = $event->getData();

                $form->get('zipCode')->setData($group->getZipCode());
                $form->get('country')->setData($group->getCountry());
            })
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                /** @var Group $group */
                $group = $event->getData();

                $this->slugify->createSlug($group);
            })
        ;

        $builder->get('city')->addModelTransformer($this->cityToUuidTransformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Group::class,
        ]);
    }
}
