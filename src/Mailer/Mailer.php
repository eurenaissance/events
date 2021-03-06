<?php

namespace App\Mailer;

use App\Entity\Actor;
use App\Entity\Event;
use App\Entity\Group;
use App\Entity\Group\CoAnimatorMembership;
use App\Entity\Group\FollowerMembership;
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

    public function sendActorRegistrationConfirmationMail(Actor $actor, string $token): void
    {
        $this->send([
            'to' => $actor->getEmailAddress(),
            'subject' => $this->trans('mail.actor.registration_confirmation.subject', [
                '%actor%' => $actor->getFirstName(),
            ]),
            'body' => $this->render('mail/actor/registration_confirmation.html.twig', [
                'actor' => $actor,
                'token' => $token,
            ]),
        ]);
    }

    public function sendActorRegistrationCompletedMail(Actor $actor): void
    {
        $this->send([
            'to' => $actor->getEmailAddress(),
            'subject' => $this->trans('mail.actor.registration_complete.subject', [
                '%actor%' => $actor->getFirstName(),
            ]),
            'body' => $this->render('mail/actor/registration_complete.html.twig', [
                'actor' => $actor,
            ]),
        ]);
    }

    public function sendActorResetPasswordRequestMail(Actor $actor, string $token): void
    {
        $this->send([
            'to' => $actor->getEmailAddress(),
            'subject' => $this->trans('mail.actor.reset_password_request.subject'),
            'body' => $this->render('mail/actor/reset_password_request.html.twig', [
                'actor' => $actor,
                'token' => $token,
            ]),
        ]);
    }

    public function sendActorResetPasswordSuccessMail(Actor $actor): void
    {
        $this->send([
            'to' => $actor->getEmailAddress(),
            'subject' => $this->trans('mail.actor.reset_password_success.subject'),
            'body' => $this->render('mail/actor/reset_password_success.html.twig', [
                'actor' => $actor,
            ]),
        ]);
    }

    public function sendActorPasswordChangedMail(Actor $actor): void
    {
        $this->send([
            'to' => $actor->getEmailAddress(),
            'subject' => $this->trans('mail.actor.password_changed.subject'),
            'body' => $this->render('mail/actor/password_changed.html.twig', [
                'actor' => $actor,
            ]),
        ]);
    }

    public function sendGroupCreatedMail(Group $group): void
    {
        if (!$group->getAnimator()->isNotificationEnabled()) {
            return;
        }

        $this->send([
            'to' => $group->getAnimator()->getEmailAddress(),
            'subject' => $this->trans('mail.group.created.subject', [
                '%group%' => $group->getName(),
            ]),
            'body' => $this->render('mail/group/created.html.twig', [
                'group' => $group,
            ]),
        ]);
    }

    public function sendGroupConfirmedMail(Group $group): void
    {
        if (!$group->getAnimator()->isNotificationEnabled()) {
            return;
        }

        $this->send([
            'to' => $group->getAnimator()->getEmailAddress(),
            'subject' => $this->trans('mail.group.confirmed.subject', [
                '%group%' => $group->getName(),
            ]),
            'body' => $this->render('mail/group/confirmed.html.twig', [
                'group' => $group,
            ]),
        ]);
    }

    public function sendGroupNewFollowerMail(FollowerMembership $membership): void
    {
        $group = $membership->getGroup();

        if (!$group->getAnimator()->isNotificationEnabled()) {
            return;
        }

        $this->send([
            'to' => $group->getAnimator()->getEmailAddress(),
            'subject' => $this->trans('mail.group.new_follower.subject', [
                '%group%' => $group->getName(),
            ]),
            'body' => $this->render('mail/group/new_follower.html.twig', [
                'membership' => $membership,
            ]),
        ]);
    }

    public function sendGroupNewCoAnimatorMail(CoAnimatorMembership $membership): void
    {
        if (!$membership->getActor()->isNotificationEnabled()) {
            return;
        }

        $this->send([
            'to' => $membership->getActor()->getEmailAddress(),
            'subject' => $this->trans('mail.group.new_co_animator.subject', [
                '%group%' => $membership->getGroup()->getName(),
            ]),
            'body' => $this->render('mail/group/new_co_animator.html.twig', [
                'membership' => $membership,
            ]),
        ]);
    }

    public function sendEventCreatedMail(Event $event): void
    {
        if (!$event->getCreator()->isNotificationEnabled()) {
            return;
        }

        $this->send([
            'to' => $event->getCreator()->getEmailAddress(),
            'subject' => $this->trans('mail.event.created.subject', [
                '%event%' => $event->getName(),
            ]),
            'body' => $this->render('mail/event/created.html.twig', [
                'event' => $event,
            ]),
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
