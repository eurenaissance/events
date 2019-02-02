<?php

namespace App\ImageProvider;

use Symfony\Component\HttpFoundation\Response;

interface ImageRequestHandlerInterface
{
    /**
     * Handle a given request and return the resulting filtered image response.
     *
     * @param string $name       The image filename (including subdirectories).
     * @param array  $parameters The request parameters, including the filters and the signature.
     *
     * @return Response The resulting response.
     */
    public function handleRequest(string $name, array $parameters): Response;
}
