<?php

namespace App\Entity\Util;

interface EntityReviewInterface
{
    public function approve(): void;

    public function refuse(): void;

    public function isApproved(): bool;

    public function isRefused(): bool;

    public function isPending(): bool;
}
