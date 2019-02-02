<?php

namespace App\ImageProvider;

use League\Glide\Signatures\SignatureFactory;

class ImageRequestSigner implements ImageRequestSignerInterface
{
    private $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    public function signRequest(string $name, array $filters): string
    {
        return SignatureFactory::create($this->secret)->generateSignature($name, $filters);
    }
}
