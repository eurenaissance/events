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
        if (!($entity = $args->getObject()) instanceof EntitySlugInterface) {
            return;
        }

        $slug = $this->slugify->slugify($entity->slug());

        $entity->setSlug($slug);
    }
}
