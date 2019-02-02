<?php

namespace App\Entity\Group;

use App\Entity\Actor;
use App\Entity\Group;
use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityUuidTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\MappedSuperclass
 */
abstract class AbstractMembership
{
    use EntityIdTrait;
    use EntityUuidTrait;

    /**
     * @var Actor
     *
     * @ORM\ManyToOne(targetEntity=Actor::class)
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $actor;

    /**
     * @var Group
     *
     * @ORM\ManyToOne(targetEntity=Group::class)
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $group;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct(UuidInterface $uuid, Actor $actor, Group $group)
    {
        $this->uuid = $uuid;
        $this->actor = $actor;
        $this->group = $group;
        $this->createdAt = new \DateTimeImmutable();
    }

    final public static function create(Actor $actor, Group $group): self
    {
        return new static(self::createUuid(), $actor, $group);
    }

    public function getActor(): Actor
    {
        return $this->actor;
    }

    public function getGroup(): Group
    {
        return $this->group;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
}
