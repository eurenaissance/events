<?php

namespace App\Entity;

use App\Entity\Util\EntityIdTrait;
use App\Entity\Util\EntityUuidTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Table(name="actor_reset_password_tokens", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="actor_reset_password_token_unique", columns="uuid")
 * })
 * @ORM\Entity(repositoryClass="App\Repository\ActorResetPasswordTokenRepository")
 */
class ActorResetPasswordToken
{
    use EntityIdTrait;
    use EntityUuidTrait;

    /**
     * @var Actor
     *
     * @ORM\ManyToOne(targetEntity=Actor::class)
     * @ORM\JoinColumn(name="actor_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $actor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $expiredAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $consumedAt;

    public function __construct(UuidInterface $uuid, Actor $actor, \DateTime $expiredAt)
    {
        $this->actor = $actor;
        $this->expiredAt = $expiredAt;
        $this->uuid = $uuid;
    }

    public static function generate(Actor $actor): self
    {
        return new self(self::createUuid(), $actor, new \DateTime('+1 day'));
    }

    public function consume(): void
    {
        if ($this->consumedAt) {
            throw new \LogicException('Token is already consumed.');
        }

        $this->consumedAt = new \DateTime('now');
    }

    public function isExpired(): bool
    {
        return new \DateTime('now') >= $this->expiredAt;
    }

    public function isConsumed(): bool
    {
        return null !== $this->consumedAt;
    }

    public function getActor(): Actor
    {
        return $this->actor;
    }

    public function getExpiredAt(): \DateTime
    {
        return $this->expiredAt;
    }

    public function getConsumedAt(): ?\DateTime
    {
        return $this->consumedAt;
    }
}
