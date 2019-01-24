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

    public function setSlug(EntitySlugInterface $entity)
    {
        $entity->setSlug($this->createSlug($entity));
    }

    private function createSlug(EntitySlugInterface $entity)
    {
        return $this->slugify->slugify($entity->createSlugSource());
    }
}
