<?php

namespace App\Actor;

use App\Entity\Actor;
use App\Entity\Actor\ConfirmToken;
use App\Mailer\Mailer;
use App\Repository\Actor\ConfirmTokenRepository;
use App\Repository\ActorRepository;
use Doctrine\ORM\EntityManagerInterface;

class RegistrationHandler
{
    private $entityManager;
    private $mailer;
    private $actorRepository;
    private $confirmTokenRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        Mailer $mailer,
        ActorRepository $actorRepository,
        ConfirmTokenRepository $confirmTokenRepository
    ) {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->actorRepository = $actorRepository;
        $this->confirmTokenRepository = $confirmTokenRepository;
    }

    public function register(Actor $actor): void
    {
        $token = ConfirmToken::generate($actor);

        $this->entityManager->persist($actor);
        $this->entityManager->persist($token);
        $this->entityManager->flush();

        $this->mailer->sendActorRegistrationConfirmationMail($actor, $token->getUuidAsString());
    }

    public function findActor(string $email): ?Actor
    {
        return $this->actorRepository->findOneByEmail($email);
    }

    public function hasPendingToken(Actor $actor): bool
    {
        return null !== $this->confirmTokenRepository->findPendingToken($actor);
    }

    public function resendConfirmation(Actor $actor): void
    {
        $token = ConfirmToken::generate($actor);

        $this->entityManager->persist($token);
        $this->entityManager->flush();

        $this->mailer->sendActorRegistrationConfirmationMail($actor, $token->getUuidAsString());
    }

    public function confirm(ConfirmToken $token): void
    {
        $actor = $token->getActor();

        $actor->confirm();
        $token->consume();

        $this->entityManager->flush();

        $this->mailer->sendActorRegistrationCompletedMail($actor);
    }
}
