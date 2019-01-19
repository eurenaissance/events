<?php

namespace App\Entity;

use App\Entity\Util\ExpiringTokenTrait;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Table(name="actor_reset_password_tokens", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="actor_reset_password_token_unique_uuid", columns="uuid")
 * })
 * @ORM\Entity(repositoryClass="App\Repository\ActorResetPasswordTokenRepository")
 */
class ActorResetPasswordToken extends ActorToken
{
    use ExpiringTokenTrait;

    public function __construct(UuidInterface $uuid, Actor $actor, \DateTime $expiredAt)
    {
        parent::__construct($uuid, $actor);

        $this->expiredAt = $expiredAt;
    }

    public static function generate(Actor $actor): ActorToken
    {
        return new self(self::createUuid(), $actor, new \DateTime('+1 day'));
    }
}
