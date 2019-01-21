<?php

namespace App\Entity\Util;

use Doctrine\ORM\Mapping as ORM;

trait EntitySlugTrait
{
    /**
     * @var string
     *
     * @ORM\Column(unique=true)
     */
    private $slug;

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }
}
