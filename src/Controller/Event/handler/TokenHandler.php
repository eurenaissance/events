<?php

namespace App\Controller\Event\handler;

use App\Repository\ApiTokenRepository;

class TokenHandler
{
    /**
     * @var ApiTokenRepository
     */
    private $repository;

    public function __construct(ApiTokenRepository $repository)
    {
        $this->repository = $repository;
    }

    public function isTokenValid(string $token): bool
    {
        return null !== $this->repository->findOneByToken($token);
    }
}
