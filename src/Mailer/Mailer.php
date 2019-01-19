<?php

namespace App\Mailer;

use App\Entity\Actor;
use Enqueue\Client\ProducerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

class Mailer
{
    public const TOPIC = 'mail';

    private $producer;
    private $translator;
    private $twig;

    public function __construct(
        ProducerInterface $producer,
        TranslatorInterface $translator,
        Environment $twig
    ) {
        $this->producer = $producer;
        $this->translator = $translator;
        $this->twig = $twig;
    }

    public function sendActorRegistrationMail(Actor $actor): void
    {
        $this->send([
            'to' => $actor->getEmailAddress(),
            'subject' => $this->trans('mail.actor.registration.subject'),
            'body' => $this->render('mail/actor/registration.html.twig', ['actor' => $actor]),
        ]);
    }

    private function send(array $mail): void
    {
        $this->producer->sendEvent(static::TOPIC, $mail);
    }

    private function trans(string $id, array $parameters = []): string
    {
        return $this->translator->trans($id, $parameters);
    }

    private function render(string $name, array $parameters = []): string
    {
        return $this->twig->render($name, $parameters);
    }
}
