<?php

namespace App\ImageProvider;

use League\Flysystem\FilesystemInterface;
use League\Glide\Filesystem\FileNotFoundException;
use League\Glide\Responses\ResponseFactoryInterface;
use League\Glide\Server;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class ImageRequestHandler implements ImageRequestHandlerInterface, ResponseFactoryInterface
{
    private $secret;
    private $glide;
    private $request;

    public function __construct(string $appSecret, Server $glide, RequestStack $requestStack = null)
    {
        $this->secret = $appSecret;
        $this->glide = $glide;
        $this->request = $requestStack ? $requestStack->getMasterRequest() : null;
    }

    public function handleRequest(string $name, array $filters): Response
    {
        try {
            SignatureFactory::create($this->secret)->validateRequest($name, $filters);
        } catch (SignatureException $e) {
            return new Response('', Response::HTTP_BAD_REQUEST);
        }

        $this->glide->setResponseFactory($this);

        try {
            return $this->cacheResponse($this->glide->getImageResponse($name, $filters), $filters);
        } catch (FileNotFoundException $e) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }
    }

    public function create(FilesystemInterface $cache, $path)
    {
        $response = new Response();
        $response->setContent($cache->read($path));
        $response->headers->set('Content-Type', $cache->getMimetype($path));
        $response->headers->set('Content-Length', $cache->getSize($path));

        if ($this->request) {
            $response->setLastModified(date_create()->setTimestamp($cache->getTimestamp($path)));
            $response->isNotModified($this->request);
        }

        return $response;
    }

    private function cacheResponse(Response $response, array $filters): Response
    {
        $response->setPublic();

        // If there is a valid cache hash, it means the caller is able to invalidate cache => 1 year
        if (!empty($filters['c'])) {
            $response->setMaxAge(31536000);
            $response->setSharedMaxAge(31536000);

            return $response;
        }

        // Otherwise, be more careful => 1 day
        $response->setMaxAge(86400);
        $response->setSharedMaxAge(86400);

        return $response;
    }
}
