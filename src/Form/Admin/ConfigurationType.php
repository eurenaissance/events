<?php

namespace App\Form\Admin;

use App\Entity\Configuration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('partyName', TextType::class, [
                'required' => true,
            ])
            ->add('partyLogo', TextType::class, [
                'required' => true,
            ])
            ->add('partyWebsite', TextType::class, [
                'required' => true,
            ])
            ->add('colorPrimary', TextType::class, [
                'required' => true,
            ])
            ->add('favicon', TextType::class, [
                'required' => true,
            ])
            ->add('metaDescription', TextType::class, [
                'required' => true,
            ])
            ->add('metaImage', TextType::class, [
                'required' => true,
            ])
            ->add('metaGoogleAnalyticsId', TextType::class, [
                'required' => false,
                'empty_data' => '',
            ])
            ->add('homeImage', TextType::class, [
                'required' => true,
            ])
            ->add('homeIntroSubtitle', TextType::class, [
                'required' => true,
            ])
            ->add('homeIntroTitle', TextType::class, [
                'required' => true,
            ])
            ->add('homeIntroButton', TextType::class, [
                'required' => true,
            ])
            ->add('homeDisplayMap', CheckboxType::class, [
                'required' => false,
                'value' => '1',
            ])
            ->add('emailSender', TextType::class, [
                'required' => false,
                'empty_data' => '',
            ])
            ->add('emailSenderName', TextType::class, [
                'required' => false,
                'empty_data' => '',
            ])
            ->add('emailContact', TextType::class, [
                'required' => false,
                'empty_data' => '',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Configuration::class,
        ]);
    }
}
