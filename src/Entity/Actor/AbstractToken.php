<?php

namespace App\Entity\Actor;

use App\Entity\Actor;
use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityUuidTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\MappedSuperclass
 */
abstract class AbstractToken
{
    use EntityIdTrait;
    use EntityUuidTrait;

    /**
     * Defines the interval specifications for the expiration date.
     *
     * @see http://php.net/manual/en/dateinterval.construct.php
     */
    protected const EXPIRATION_INTERVAL = 'PT2H';

    /**
     * @var Actor
     *
     * @ORM\ManyToOne(targetEntity=Actor::class)
     * @ORM\JoinColumn(name="actor_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $actor;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    protected $expiredAt;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $consumedAt;

    public function __construct(UuidInterface $uuid, Actor $actor, \DateTimeInterface $expiredAt)
    {
        $this->actor = $actor;
        $this->uuid = $uuid;
        $this->expiredAt = $expiredAt;
    }

    final public static function generate(Actor $actor): self
    {
        $expirationDate = (new \DateTime('now'))->add(new \DateInterval(static::EXPIRATION_INTERVAL));

        return new static(self::createUuid(), $actor, $expirationDate);
    }

    public function consume(): void
    {
        if ($this->consumedAt) {
            throw new \LogicException('Token is already consumed.');
        }

        $this->consumedAt = new \DateTimeImmutable('now');
    }

    public function isConsumed(): bool
    {
        return null !== $this->consumedAt;
    }

    public function isExpired(): bool
    {
        return new \DateTime('now') >= $this->expiredAt;
    }

    public function getActor(): Actor
    {
        return $this->actor;
    }

    public function getConsumedAt(): ?\DateTimeInterface
    {
        return $this->consumedAt;
    }

    public function getExpiredAt(): \DateTimeInterface
    {
        return $this->expiredAt;
    }
}
