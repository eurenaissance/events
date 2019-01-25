<?php

namespace App\Util;

use App\Entity\Util\EntitySlugInterface;
use Cocur\Slugify\SlugifyInterface;

class Slugify
{
    private $slugify;

    public function __construct(SlugifyInterface $slugify)
    {
        $this->slugify = $slugify;
    }

    public function createSlug(EntitySlugInterface $entity): void
    {
        $entity->setSlug($this->buildSlug($entity));
    }

    private function buildSlug(EntitySlugInterface $entity): string
    {
        return $this->slugify->slugify($entity->createSlugSource());
    }
}
