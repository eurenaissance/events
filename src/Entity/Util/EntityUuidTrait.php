<?php

namespace App\Entity\Util;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;

trait EntityUuidTrait
{
    /**
     * @var UuidInterface
     *
     * @ORM\Column(type="uuid", unique=true)
     *
     * @Groups("city_autocomplete")
     */
    private $uuid;

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function getUuidAsString(): string
    {
        return $this->uuid->toString();
    }

    protected static function createUuid(): UuidInterface
    {
        return Uuid::uuid4();
    }
}
