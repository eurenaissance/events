<?php

namespace App\Entity\Util;

use Doctrine\ORM\Mapping as ORM;

trait EntityReviewTrait
{
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $approvedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $refusedAt;

    public function approve(): void
    {
        $this->approvedAt = new \DateTimeImmutable();
        $this->refusedAt = null;
    }

    public function refuse(): void
    {
        $this->refusedAt = new \DateTimeImmutable();
    }

    public function isApproved(): bool
    {
        return null !== $this->approvedAt && null === $this->refusedAt;
    }

    public function isRefused(): bool
    {
        return null !== $this->refusedAt;
    }

    public function isPending(): bool
    {
        return null === $this->approvedAt && null === $this->refusedAt;
    }

    public function getStatus(): string
    {
        if ($this->refusedAt) {
            return 'refused';
        }

        if ($this->approvedAt) {
            return 'approved';
        }

        return 'pending';
    }
}
