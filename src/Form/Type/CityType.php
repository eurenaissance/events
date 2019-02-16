<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CityType extends AbstractType
{
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['country_field'] = $options['country_field'];
        $view->vars['zip_code_field'] = $options['zip_code_field'];
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'invalid_message' => 'common.city.invalid',
            'error_bubbling' => false,
            'country_field' => null,
            'zip_code_field' => null,
            'attr' => ['class' => 'city-autocomplete'],
        ]);
    }

    public function getBlockPrefix()
    {
        return 'city';
    }

    public function getParent()
    {
        return TextType::class;
    }
}
