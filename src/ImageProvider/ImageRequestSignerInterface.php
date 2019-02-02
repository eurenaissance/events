<?php

namespace App\ImageProvider;

interface ImageRequestSignerInterface
{
    /**
     * Create a signature for the given request (to ensure requests are coming from the provider).
     *
     * @param string $name    The image filename (including subdirectories).
     * @param array  $filters The array of filters that are going to be applied in the request.
     *
     * @return string The generated signature to use in your request.
     */
    public function signRequest(string $name, array $filters): string;
}
