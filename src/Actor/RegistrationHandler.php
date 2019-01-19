<?php

namespace App\Actor;

use App\Entity\Actor;
use App\Entity\ActorConfirmToken;
use App\Mailer\Mailer;
use App\Repository\ActorConfirmTokenRepository;
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
        ActorConfirmTokenRepository $confirmTokenRepository
    ) {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->actorRepository = $actorRepository;
        $this->confirmTokenRepository = $confirmTokenRepository;
    }

    public function register(Actor $actor): void
    {
        $token = ActorConfirmToken::generate($actor);

        $this->entityManager->persist($actor);
        $this->entityManager->persist($token);
        $this->entityManager->flush();

        $this->mailer->sendActorRegistrationMail($actor, $token->getUuidAsString());
    }

    public function findActor(string $email): ?Actor
    {
        return $this->actorRepository->findOneByEmail($email);
    }

    public function findPendingToken(Actor $actor): ?ActorConfirmToken
    {
        return $this->confirmTokenRepository->findPendingToken($actor);
    }

    public function resendConfirmation(Actor $actor): void
    {
        // Consumed tokens will be deleted by a cleanup task
        if (!$token = $this->confirmTokenRepository->findPendingToken($actor)) {
            return;
        }

        $this->mailer->sendActorRegistrationMail($actor, $token->getUuidAsString());
    }

    public function confirm(ActorConfirmToken $token): void
    {
        $token->getActor()->confirm();
        $token->consume();

        $this->entityManager->flush();
    }
}
