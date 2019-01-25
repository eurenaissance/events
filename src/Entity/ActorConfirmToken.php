<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="actor_confirm_tokens")
 * @ORM\Entity(repositoryClass="App\Repository\ActorConfirmTokenRepository")
 */
class ActorConfirmToken extends ActorToken
{
}
