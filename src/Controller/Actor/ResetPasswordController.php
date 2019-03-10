<?php

namespace App\Controller\Actor;

use App\Actor\ResetPasswordHandler;
use App\Entity\Actor\ResetPasswordToken;
use App\Form\Actor\PasswordType;
use App\Form\Actor\EmailRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reset-password")
 */
class ResetPasswordController extends AbstractController
{
    /**
     * @Route(name="app_actor_reset_password_request", methods={"GET", "POST"})
     */
    public function request(Request $request, ResetPasswordHandler $resetPasswordHandler): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_actor_profile_change_password');
        }

        $form = $this->createForm(EmailRequestType::class);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            /** @var string $email */
            $email = $form->get('emailAddress')->getData();

            if ($actor = $resetPasswordHandler->findActor($email)) {
                if ($resetPasswordHandler->hasPendingToken($actor)) {
                    $this->addFlash('warning', 'flashes.reset_password.pending_token');

                    return $this->redirectToRoute('app_login');
                }

                $resetPasswordHandler->request($actor);
            }

            return $this->redirectToRoute('app_actor_reset_password_check_email');
        }

        return $this->render('actor/reset_password/request.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/check-email", name="app_actor_reset_password_check_email", methods="GET")
     */
    public function checkEmail(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_actor_profile_change_password');
        }

        return $this->render('actor/reset_password/check_email.html.twig');
    }

    /**
     * @Route(
     *     "/{uuid}",
     *     name="app_actor_reset_password_reset",
     *     requirements={"uuid": "%pattern_uuid%"},
     *     methods={"GET", "POST"}
     * )
     */
    public function reset(
        Request $request,
        ResetPasswordToken $token,
        ResetPasswordHandler $resetPasswordHandler
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_actor_profile_change_password');
        }

        if ($token->isConsumed()) {
            $this->addFlash('danger', 'flashes.reset_password.token_expired');

            return $this->redirectToRoute('app_login');
        }

        if ($token->isExpired()) {
            $this->addFlash('danger', 'flashes.reset_password.token_expired');

            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(PasswordType::class, $token->getActor());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $resetPasswordHandler->reset($token);

            $this->addFlash('success', 'flashes.reset_password.success');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('actor/reset_password/reset.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
