<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType as BaseCountryType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryType extends AbstractType
{
    private $defaultCountry;

    public function __construct(string $appCountry)
    {
        $this->defaultCountry = strtoupper($appCountry);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data' => $this->defaultCountry,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_country';
    }

    public function getParent()
    {
        return BaseCountryType::class;
    }
}
