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
     * @ORM\Column(type="uuid")
     *
     * @Groups("city_autocomplete")
     */
    protected $uuid;

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
