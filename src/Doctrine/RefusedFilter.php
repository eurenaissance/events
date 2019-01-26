<?php

namespace App\Doctrine;

use App\Entity\Util\EntityReviewInterface;
use Doctrine\ORM\Mapping\ClassMetaData;
use Doctrine\ORM\Query\Filter\SQLFilter;

class RefusedFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if (!$targetEntity->reflClass->implementsInterface(EntityReviewInterface::class)) {
            return '';
        }

        return "$targetTableAlias.refused_at IS NULL";
    }
}
