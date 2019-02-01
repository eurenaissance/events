<?php

namespace App\Controller\Actor;

use App\Actor\RegistrationHandler;
use App\Entity\Actor;
use App\Entity\Actor\ConfirmToken;
use App\Form\Actor\EmailRequestType;
use App\Form\Actor\RegistrationType;
use App\Repository\GroupRepository;
use App\Security\AuthenticationUtils;
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
     * @Route(name="app_actor_registration_register", methods={"GET", "POST"})
     */
    public function register(Request $request, RegistrationHandler $registrationHandler): Response
    {
        $this->denyAccessUnlessGranted('ACTOR_REGISTER');

        $form = $this->createForm(RegistrationType::class, $actor = new Actor());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $registrationHandler->register($actor);

            return $this->redirectToRoute('app_actor_registration_success');
        }

        return $this->render('actor/registration/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/check-email", name="app_actor_registration_success", methods="GET")
     */
    public function success(): Response
    {
        $this->denyAccessUnlessGranted('ACTOR_REGISTER');

        return $this->render('actor/registration/success.html.twig');
    }

    /**
     * @Route("/resend-confirmation", name="app_actor_register_resend_confirmation", methods={"GET", "POST"})
     */
    public function resendConfirmation(Request $request, RegistrationHandler $registrationHandler): Response
    {
        $this->denyAccessUnlessGranted('ACTOR_REGISTER');

        $form = $this->createForm(EmailRequestType::class);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            /** @var string $email */
            $email = $form->get('emailAddress')->getData();

            if ($actor = $registrationHandler->findActor($email)) {
                if ($actor->isConfirmed()) {
                    $this->addFlash('info', 'actor.registration.resend_confirmation.flash.already_confirmed');

                    return $this->redirectToRoute('app_login');
                }

                if ($registrationHandler->hasPendingToken($actor)) {
                    $this->addFlash('info', 'actor.registration.resend_confirmation.flash.pending_token');

                    return $this->redirectToRoute('app_login');
                }

                $registrationHandler->resendConfirmation($actor);
            }

            return $this->redirectToRoute('app_actor_register_resend_confirmation_success');
        }

        return $this->render('actor/registration/resend_confirmation.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/resend-confirmation/check-email", name="app_actor_register_resend_confirmation_success", methods="GET")
     */
    public function resendConfirmationSuccess(): Response
    {
        $this->denyAccessUnlessGranted('ACTOR_REGISTER');

        return $this->render('actor/registration/resend_confirmation_success.html.twig');
    }

    /**
     * @Route(
     *     "/confirm/{uuid}",
     *     name="app_actor_registration_confirm",
     *     requirements={"uuid": "%pattern_uuid%"},
     *     methods="GET"
     * )
     */
    public function confirm(
        ConfirmToken $token,
        RegistrationHandler $registrationHandler,
        AuthenticationUtils $authenticationUtils
    ): Response {
        $this->denyAccessUnlessGranted('ACTOR_REGISTER');

        $actor = $token->getActor();
        if ($token->isConsumed() || $actor->isConfirmed()) {
            $this->addFlash('info', 'actor.registration.confirm.flash.already_confirmed');

            return $this->redirectToRoute('app_login');
        }

        if ($token->isExpired()) {
            $this->addFlash('info', 'actor.registration.confirm.flash.token_expired');

            return $this->redirectToRoute('app_actor_register_resend_confirmation');
        }

        $registrationHandler->confirm($token);
        $authenticationUtils->authenticateActor($actor);

        return $this->redirectToRoute('app_actor_register_confirmed');
    }

    /**
     * @Route("/confirmed", name="app_actor_register_confirmed", methods="GET")
     */
    public function confirmed(GroupRepository $groupRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ACTOR');

        return $this->render('actor/registration/confirmed.html.twig', [
            'closest_groups' => $groupRepository->findClosestFrom($this->getUser(), 3),
        ]);
    }
}
