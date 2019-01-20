<?php

namespace App\Controller;

use App\Actor\RegistrationHandler;
use App\Entity\Actor;
use App\Entity\ActorConfirmToken;
use App\Form\Actor\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/register")
 */
class RegistrationController extends AbstractController
{
    /**
     * @Route(name="app_registration_form", methods={"GET", "POST"})
     */
    public function register(Request $request, RegistrationHandler $registrationHandler): Response
    {
        $form = $this->createForm(RegistrationType::class, $actor = new Actor());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $registrationHandler->register($actor);

            return $this->redirectToRoute('app_registration_success');
        }

        return $this->render('registration/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/check-email", name="app_registration_success", methods="GET")
     */
    public function success(): Response
    {
        return $this->render('registration/success.html.twig');
    }

    /**
     * @Route(
     *     "/confirm/{uuid}",
     *     name="app_registration_confirm",
     *     requirements={"uuid": "%pattern_uuid%"},
     *     methods="GET"
     * )
     */
    public function confirm(ActorConfirmToken $token, RegistrationHandler $registrationHandler): Response
    {
        if ($token->isConsumed() || $token->getActor()->isConfirmed()) {
            $this->addFlash('info', 'actor.registration.already_confirmed');

            return $this->redirectToRoute('app_login');
        }

        if ($token->isExpired()) {
            $this->addFlash('info', 'actor.registration.token_expired');

            return $this->redirectToRoute('app_resend_confirmation_request');
        }

        $registrationHandler->confirm($token);

        $this->addFlash('info', 'actor.registration.confirmed');

        return $this->redirectToRoute('app_login');
    }
}
