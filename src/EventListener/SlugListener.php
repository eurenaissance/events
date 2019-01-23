<?php

namespace App\EventListener;

use App\Entity\Util\EntitySlugInterface;
use Cocur\Slugify\SlugifyInterface;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class SlugListener
{
    private $slugify;

    public function __construct(SlugifyInterface $slugify)
    {
        $this->slugify = $slugify;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof EntitySlugInterface) {
            return;
        }

        $entity->setSlug($this->createSlug($entity));
    }

    private function createSlug(EntitySlugInterface $entity)
    {
        return $this->slugify->slugify($entity->createSlugSource());
    }
}
