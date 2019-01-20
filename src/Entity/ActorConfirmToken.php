<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="actor_confirm_tokens", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="actor_confirm_token_unique_uuid", columns="uuid"),
 * })
 * @ORM\Entity(repositoryClass="App\Repository\ActorConfirmTokenRepository")
 */
class ActorConfirmToken extends ActorToken
{
}
