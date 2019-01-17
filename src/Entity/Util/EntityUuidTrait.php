<?php

namespace App\Entity\Util;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

trait EntityUuidTrait
{
    /**
     * @var UuidInterface
     *
     * @ORM\Column(type="uuid")
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
