<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="actor_confirm_tokens", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="actor_confirm_token_unique_uuid", columns="uuid"),
 *     @ORM\UniqueConstraint(name="actor_confirm_token_unique_actor_id", columns="actor_id")
 * })
 * @ORM\Entity(repositoryClass="App\Repository\ActorConfirmTokenRepository")
 */
class ActorConfirmToken extends ActorToken
{
    public static function generate(Actor $actor): ActorToken
    {
        return new self(self::createUuid(), $actor);
    }
}
