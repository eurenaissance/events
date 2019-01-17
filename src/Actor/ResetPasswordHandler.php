<?php

namespace App\Actor;

use App\Entity\Actor;
use App\Entity\ActorResetPasswordToken;
use App\Repository\ActorResetPasswordTokenRepository;
use Doctrine\ORM\EntityManagerInterface;

class ResetPasswordHandler
{
    private $entityManager;
    private $actorResetPasswordTokenRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        ActorResetPasswordTokenRepository $actorResetPasswordTokenRepository
    ) {
        $this->entityManager = $entityManager;
        $this->actorResetPasswordTokenRepository = $actorResetPasswordTokenRepository;
    }

    public function hasPendingToken(Actor $actor): bool
    {
        return null !== $this->actorResetPasswordTokenRepository->findPendingToken($actor);
    }

    public function request(Actor $actor): void
    {
        $token = ActorResetPasswordToken::generate($actor);

        $this->entityManager->persist($token);
        $this->entityManager->flush();
    }

    public function reset(ActorResetPasswordToken $token): void
    {
        $token->consume();

        $this->entityManager->flush();
    }
}
