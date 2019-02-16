<?php

namespace App\Form\Group;

use Symfony\Component\Form\AbstractType;

class EditionType extends AbstractType
{
    public function getParent()
    {
        return GroupType::class;
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
