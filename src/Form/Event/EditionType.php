<?php

namespace App\Form\Event;

use Symfony\Component\Form\AbstractType;

class EditionType extends AbstractType
{
    public function getParent()
    {
        return EventType::class;
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
