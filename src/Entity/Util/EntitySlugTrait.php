<?php

namespace App\Entity\Util;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

trait EntitySlugTrait
{
    /**
     * @var string
     *
     * @ORM\Column(unique=true)
     *
     * @Groups("search")
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
