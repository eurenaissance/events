<?php

namespace App\Controller;

use App\Configuration\InstanceConfiguration;
use App\Entity\Actor;
use App\Entity\ContactMessage;
use App\Form\ContactMessageType;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact", methods={"GET", "POST"})
     * @Route("/contact/actor/{uuid}", requirements={"uuid": "%pattern_uuid%"}, name="app_contact_actor", methods={"GET", "POST"})
     */
    public function contact(
        InstanceConfiguration $config,
        EntityManagerInterface $manager,
        Mailer $mailer,
        Request $request,
        string $uuid = null
    ): Response {
        $actor = null;
        if ($uuid && !($actor = $manager->getRepository(Actor::class)->findOneByUuid($uuid))) {
            throw $this->createNotFoundException('Actor not found');
        }

        if (!$actor && !$config->getEmailContact()) {
            throw $this->createNotFoundException('Contact e-mail not configured');
        }

        $message = new ContactMessage($actor ? $actor->getEmailAddress() : $config->getEmailContact());
        if ($this->getUser()) {
            $message->setSender($this->getUser()->getEmailAddress());
        }

        $form = $this->createForm(ContactMessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($message);
            $manager->flush();

            $mailer->sendContactMessage($message);

            $this->addFlash('success', 'flashes.contact.success');

            if ($actor) {
                return $this->redirectToRoute('app_contact_actor', ['uuid' => $actor->getUuidAsString()]);
            }

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/contact.html.twig', [
            'type' => $actor ? 'actor' : 'admin',
            'actor' => $actor,
            'form' => $form->createView(),
        ]);
    }
}
