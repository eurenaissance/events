<?php

namespace App\Controller\Event;

use App\Entity\Actor;
use App\Entity\Event;
use App\Entity\Group;
use App\Event\CreationHandler;
use App\Form\Event\CreationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationController extends AbstractController
{
    /**
     * @Route("/event/create/choose-group", name="app_event_create_choose_group")
     */
    public function choose(): Response
    {
        /** @var Actor $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_homepage');
        }

        $availableGroups = [];
        foreach (array_merge($user->getCoAnimatedGroups()->toArray(), $user->getAnimatedGroups()->toArray()) as $group) {
            if ($this->isGranted('EVENT_CREATE', $group)) {
                $availableGroups[] = $group;
            }
        }

        if (!$availableGroups) {
            return $this->redirectToRoute('home');
        }

        return $this->render('event/creation/choose.html.twig', [
            'groups' => $availableGroups,
        ]);
    }

    /**
     * @Route("/group/{slug}/event/create", name="app_event_create", methods={"GET", "POST"})
     * @Entity("group", expr="repository.findApprovedBySlug(slug)")
     */
    public function create(Group $group, Request $request, CreationHandler $creationHandler): Response
    {
        $this->denyAccessUnlessGranted('EVENT_CREATE', $group);

        $form = $this->createForm(CreationType::class, $event = new Event(), [
            'group' => $group,
        ]);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $creationHandler->create($event);

            $this->addFlash('success', 'event_create.success');

            return $this->redirectToRoute('app_event_view', ['slug' => $event->getSlug()]);
        }

        return $this->render('event/creation/create.html.twig', [
            'group' => $group,
            'form' => $form->createView(),
        ]);
    }
}
