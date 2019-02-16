<?php

namespace App\Form\Event;

use App\Entity\Actor;
use App\Entity\Event;
use App\Entity\Group;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;

class CreationType extends AbstractType
{
    /**
     * @var Actor
     */
    private $creator;

    public function __construct(Security $security)
    {
        if (!$creator = $security->getUser()) {
            throw new \InvalidArgumentException('An event cannot be created without a creator.');
        }

        $this->creator = $creator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                /** @var Group $group */
                $group = $event->getForm()->getConfig()->getOption('group');
                /** @var Event $groupEvent */
                $groupEvent = $event->getData();

                $groupEvent->setCreator($this->creator);
                $groupEvent->setGroup($group);
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('group', null)
            ->setRequired('group')
            ->setAllowedTypes('group', Group::class)
        ;
    }

    public function getParent()
    {
        return EventType::class;
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
