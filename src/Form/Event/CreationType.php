<?php

namespace App\Form\Event;

use App\Entity\Actor;
use App\Entity\Event;
use App\Entity\Group;
use App\Form\DataTransformer\CityToUuidTransformer;
use App\Util\Slugify;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class CreationType extends AbstractType
{
    /**
     * @var Actor
     */
    private $creator;
    private $slugify;
    private $cityToUuidTransformer;

    public function __construct(Security $security, Slugify $slugify, CityToUuidTransformer $cityToUuidTransformer)
    {
        if (!$creator = $security->getUser()) {
            throw new \InvalidArgumentException('An event cannot be created without a creator.');
        }

        $this->creator = $creator;
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
            ->add('beginAt', DateType::class, [
                'widget' => 'choice',
                'years' => $options['years'],
                'placeholder' => [
                    'year' => 'base.date.year',
                    'month' => 'base.date.month',
                    'day' => 'base.date.day',
                ],
                'invalid_message' => 'base.date.invalid',
                'empty_data' => null,
            ])
            ->add('finishAt', DateType::class, [
                'widget' => 'choice',
                'years' => $options['years'],
                'placeholder' => [
                    'year' => 'base.date.year',
                    'month' => 'base.date.month',
                    'day' => 'base.date.day',
                ],
                'invalid_message' => 'base.date.invalid',
                'empty_data' => null,
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
            ->add('city', HiddenType::class, [
                'invalid_message' => 'common.city.invalid',
                'error_bubbling' => false,
            ])
            ->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
                $form = $event->getForm();
                /** @var Event $groupEvent */
                $groupEvent = $event->getData();

                $form->get('zipCode')->setData($groupEvent->getZipCode());
                $form->get('country')->setData($groupEvent->getCountry());
            })
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                /** @var Group $group */
                $group = $event->getForm()->getConfig()->getOption('group');
                /** @var Event $groupEvent */
                $groupEvent = $event->getData();

                $groupEvent->setCreator($this->creator);
                $groupEvent->setGroup($group);
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
                'group' => null,
            ])
            ->setRequired('group')
            ->setAllowedTypes('group', Group::class)
        ;
    }

    public function getBlockPrefix()
    {
        return null;
    }

    private function getDatesYears(): array
    {
        $years = range((int) date('Y'), (int) date('Y', strtotime('+5 years')));

        return array_combine($years, $years);
    }
}
