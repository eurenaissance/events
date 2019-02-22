<?php

namespace App\DataExposer;

class DataExposer
{
    private $exposed = [];

    public function expose(string $key, $value)
    {
        $this->exposed[$key] = $value;
    }

    public function getExposed(): array
    {
        return $this->exposed;
    }
}
