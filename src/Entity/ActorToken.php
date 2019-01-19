<?php

namespace App\Entity;

use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityUuidTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\MappedSuperclass
 */
abstract class ActorToken
{
    use EntityIdTrait;
    use EntityUuidTrait;

    /**
     * @var Actor
     *
     * @ORM\ManyToOne(targetEntity=Actor::class)
     * @ORM\JoinColumn(name="actor_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $actor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $consumedAt;

    public function __construct(UuidInterface $uuid, Actor $actor)
    {
        $this->actor = $actor;
        $this->uuid = $uuid;
    }

    abstract public static function generate(Actor $actor): self;

    public function consume(): void
    {
        if ($this->consumedAt) {
            throw new \LogicException('Token is already consumed.');
        }

        $this->consumedAt = new \DateTime('now');
    }

    public function isConsumed(): bool
    {
        return null !== $this->consumedAt;
    }

    public function getActor(): Actor
    {
        return $this->actor;
    }

    public function getConsumedAt(): ?\DateTime
    {
        return $this->consumedAt;
    }
}
