<?php

namespace App\Entity\Util;

trait EntityIdTrait
{
    /**
     * @var int|null
     *
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
