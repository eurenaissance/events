<?php

namespace App\Form\Group;

use App\Entity\Actor;
use App\Entity\Group;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Security\Core\Security;

class CreationType extends AbstractType
{
    /**
     * @var Actor
     */
    private $animator;

    public function __construct(Security $security)
    {
        if (!($animator = $security->getUser()) || !$animator instanceof Actor) {
            throw new \InvalidArgumentException('A group cannot be created without an Actor.');
        }

        $this->animator = $animator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                /** @var Group $group */
                $group = $event->getData();

                $group->setAnimator($this->animator);
            })
        ;
    }

    public function getParent()
    {
        return GroupType::class;
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
