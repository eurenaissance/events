<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="actor_reset_password_tokens", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="actor_reset_password_token_unique_uuid", columns="uuid")
 * })
 * @ORM\Entity(repositoryClass="App\Repository\ActorResetPasswordTokenRepository")
 */
class ActorResetPasswordToken extends ActorToken
{
}
