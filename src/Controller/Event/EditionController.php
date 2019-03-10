<?php

namespace App\Controller\Event;

use App\Entity\Event;
use App\Event\EditionHandler;
use App\Form\Event\EditionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditionController extends AbstractController
{
    /**
     * @Route("/event/{slug}/edit", name="app_event_edit", methods={"GET", "POST"})
     */
    public function edit(Event $event, Request $request, EditionHandler $editionHandler): Response
    {
        $this->denyAccessUnlessGranted('EVENT_EDIT', $event);

        $form = $this->createForm(EditionType::class, $event);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $editionHandler->edit($event);

            return $this->redirectToRoute('app_event_view', ['slug' => $event->getSlug()]);
        }

        return $this->render('event/edition/edit.html.twig', [
            'event' => $event,
            'form' => $form->createView(),
        ]);
    }
}
