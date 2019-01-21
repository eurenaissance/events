<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="actor_reset_password_tokens")
 * @ORM\Entity(repositoryClass="App\Repository\ActorResetPasswordTokenRepository")
 */
class ActorResetPasswordToken extends ActorToken
{
}
