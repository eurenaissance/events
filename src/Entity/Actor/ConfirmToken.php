<?php

namespace App\Entity\Actor;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="actor_confirm_tokens")
 * @ORM\Entity(repositoryClass="App\Repository\Actor\ConfirmTokenRepository")
 */
class ConfirmToken extends AbstractToken
{
}
