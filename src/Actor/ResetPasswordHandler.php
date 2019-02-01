<?php

namespace App\Actor;

use App\Entity\Actor;
use App\Entity\Actor\ResetPasswordToken;
use App\Mailer\Mailer;
use App\Repository\ActorRepository;
use App\Repository\Actor\ResetPasswordTokenRepository;
use Doctrine\ORM\EntityManagerInterface;

class ResetPasswordHandler
{
    private $entityManager;
    private $mailer;
    private $actorRepository;
    private $actorResetPasswordTokenRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        Mailer $mailer,
        ActorRepository $actorRepository,
        ResetPasswordTokenRepository $actorResetPasswordTokenRepository
    ) {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->actorRepository = $actorRepository;
        $this->actorResetPasswordTokenRepository = $actorResetPasswordTokenRepository;
    }

    public function findActor(string $email): ?Actor
    {
        return $this->actorRepository->findOneByEmail($email);
    }

    public function hasPendingToken(Actor $actor): bool
    {
        return null !== $this->actorResetPasswordTokenRepository->findPendingToken($actor);
    }

    public function request(Actor $actor): void
    {
        $token = ResetPasswordToken::generate($actor);

        $this->entityManager->persist($token);
        $this->entityManager->flush();

        $this->mailer->sendActorResetPasswordRequestMail($actor, $token->getUuidAsString());
    }

    public function reset(ResetPasswordToken $token): void
    {
        $token->consume();

        $this->entityManager->flush();

        $this->mailer->sendActorResetPasswordSuccessMail($token->getActor());
    }
}
