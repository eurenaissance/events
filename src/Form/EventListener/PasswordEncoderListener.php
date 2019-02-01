<?php

namespace App\Form\EventListener;

use App\Form\RepeatedPasswordType;
use App\Security\PasswordEncoder;
use App\Security\User\UserPasswordInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class PasswordEncoderListener implements EventSubscriberInterface
{
    private const FIELD_NAME = 'plainPassword';

    private $encoder;

    public function __construct(PasswordEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public static function getSubscribedEvents()
    {
        return [
            FormEvents::PRE_SET_DATA => 'onPreSetData',
            FormEvents::POST_SUBMIT => 'onPostSubmit',
        ];
    }

    public function onPreSetData(FormEvent $event)
    {
        $form = $event->getForm();
        $required = true;
        $validationGroups = RepeatedPasswordType::VALIDATION_GROUPS;

        if ($form->has(self::FIELD_NAME)) {
            $required = $form->get(self::FIELD_NAME)->isRequired();
            $form->remove(self::FIELD_NAME);
        }

        if ($required) {
            $validationGroups[] = RepeatedPasswordType::VALIDATION_GROUP_REQUIRED;
        }

        $form->add(self::FIELD_NAME, RepeatedPasswordType::class, [
            'required' => $required,
            'validation_groups' => $validationGroups,
        ]);
    }

    public function onPostSubmit(FormEvent $event)
    {
        if (!$field = $event->getForm()->get(self::FIELD_NAME)) {
            return;
        }

        if (!$plainPassword = $field->getData()) {
            return;
        }

        /** @var UserPasswordInterface $user */
        $user = $event->getData();

        $this->encoder->encodePassword($user, $plainPassword);
    }
}
