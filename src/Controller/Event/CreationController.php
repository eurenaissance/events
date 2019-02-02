<?php

namespace App\Controller\Event;

use App\Entity\Event;
use App\Entity\Group;
use App\Event\CreationHandler;
use App\Form\Event\CreationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationController extends AbstractController
{
    /**
     * @Route("/group/{slug}/event/create", name="app_event_creation_create", methods={"GET", "POST"})
     */
    public function create(Group $group, Request $request, CreationHandler $creationHandler): Response
    {
        $this->denyAccessUnlessGranted('EVENT_CREATE', $group);

        $form = $this->createForm(CreationType::class, $event = new Event(), [
            'group' => $group,
        ]);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $creationHandler->create($event);

            return $this->redirectToRoute('app_event_view', ['slug' => $event->getSlug()]);
        }

        return $this->render('event/creation/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
