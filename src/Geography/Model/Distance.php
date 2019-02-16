<?php

namespace App\Geography\Model;

class Distance
{
    use AccuracyTrait;

    private $meters;

    public function __construct(int $meters, string $accuracy)
    {
        $this->meters = $meters;

        $this->setAccuracy($accuracy);
    }

    public function getMeters(): int
    {
        return $this->meters;
    }

    public function getKilometers(): float
    {
        return round($this->meters / 1000, 1);
    }
}
