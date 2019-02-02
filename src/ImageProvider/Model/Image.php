<?php

namespace App\ImageProvider\Model;

class Image
{
    private $filename;
    private $mimeType;
    private $width;
    private $height;
    private $weight;

    public function __construct(string $filename, string $mimeType, int $width, int $height, int $weight)
    {
        $this->filename = $filename;
        $this->mimeType = $mimeType;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }
}
