<?php

namespace App\Entity\Util;

use Doctrine\ORM\Mapping as ORM;

trait ExpiringTokenTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $expiredAt;

    public function isExpired(): bool
    {
        return new \DateTime('now') >= $this->expiredAt;
    }

    public function getExpiredAt(): \DateTime
    {
        return $this->expiredAt;
    }
}
