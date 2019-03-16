<?php

namespace App\Api;

use App\Repository\ApiTokenRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class TokenValidator
{
    /**
     * @var ApiTokenRepository
     */
    private $repository;

    public function __construct(ApiTokenRepository $repository)
    {
        $this->repository = $repository;
    }

    public function denyAccessUnlessValidToken(string $token)
    {
        if (null === $this->repository->findOneByToken($token)) {
            throw new BadRequestHttpException();
        }
    }
}
