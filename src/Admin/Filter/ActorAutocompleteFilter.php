<?php

namespace App\Admin\Filter;

use App\Entity\Actor;
use Sonata\DoctrineORMAdminBundle\Filter\ModelAutocompleteFilter;

class ActorAutocompleteFilter extends ModelAutocompleteFilter
{
    public function getDefaultOptions()
    {
        return array_merge_recursive(parent::getDefaultOptions(), [
            'advanced_filter' => false,
            'property' => ['emailAddress', 'fullName'],
            'field_options' => [
                'property' => ['emailAddress', 'fullName'],
                'to_string_callback' => function (Actor $actor) {
                    return sprintf('%s (%s)', $actor->getFullName(), $actor->getEmailAddress());
                },
            ],
        ]);
    }
}
