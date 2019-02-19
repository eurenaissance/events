<?php

namespace App\Geography\Model;

use Webmozart\Assert\Assert;

/**
 * Ease the handling of accuracy in Geography models.
 *
 * A high accuracy means the system will use it to display distances between users and groups/events locations.
 * A low accuracy means the system won't use it to display distances but only for search and ordering of results.
 */
trait AccuracyTrait
{
    /**
     * @var string
     */
    private $accuracy;

    private function setAccuracy(string $accuracy)
    {
        Assert::oneOf($accuracy, ['high', 'low']);

        $this->accuracy = $accuracy;
    }

    public function isHighAccuracy(): bool
    {
        return 'high' === $this->accuracy;
    }

    public function isLowAccuracy(): bool
    {
        return 'low' === $this->accuracy;
    }

    public function getAccuracy(): string
    {
        return $this->accuracy;
    }
}
