<?php

namespace App\Controller;

use App\Actor\RegistrationHandler;
use App\Form\Actor\EmailRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/register/resend-confirmation")
 */
class ResendConfirmationController extends AbstractController
{
    /**
     * @Route(name="app_resend_confirmation_request", methods={"GET", "POST"})
     */
    public function request(Request $request, RegistrationHandler $registrationHandler): Response
    {
        $form = $this->createForm(EmailRequestType::class);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            /** @var string $email */
            $email = $form->get('emailAddress')->getData();

            if ($actor = $registrationHandler->findActor($email)) {
                if ($actor->isConfirmed()) {
                    $this->addFlash('info', 'actor.registration.already_confirmed');

                    return $this->redirectToRoute('app_login');
                }

                if ($registrationHandler->hasPendingToken($actor)) {
                    $this->addFlash('info', 'actor.registration.pending_token');

                    return $this->redirectToRoute('app_login');
                }

                $registrationHandler->resendConfirmation($actor);
            }

            return $this->redirectToRoute('app_resend_confirmation_success');
        }

        return $this->render('registration/resend_confirmation/request.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/check-email", name="app_resend_confirmation_success", methods="GET")
     */
    public function success(): Response
    {
        return $this->render('registration/resend_confirmation/check_email.html.twig');
    }
}
