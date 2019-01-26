<?php

namespace App\Entity\Actor;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="actor_reset_password_tokens")
 * @ORM\Entity(repositoryClass="App\Repository\Actor\ResetPasswordTokenRepository")
 */
class ResetPasswordToken extends AbstractToken
{
}
