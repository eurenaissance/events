<?php

namespace App\Controller\Actor;

use App\Actor\ResetPasswordHandler;
use App\Entity\ActorResetPasswordToken;
use App\Form\Actor\PasswordType;
use App\Form\Actor\EmailRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/password")
 */
class ResetPasswordController extends AbstractController
{
    /**
     * @Route("/request", name="app_actor_reset_password_request", methods={"GET", "POST"})
     */
    public function request(Request $request, ResetPasswordHandler $resetPasswordHandler): Response
    {
        $this->denyAccessUnlessGranted('ACTOR_RESET_PASSWORD');

        $form = $this->createForm(EmailRequestType::class);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            /** @var string $email */
            $email = $form->get('emailAddress')->getData();

            if ($actor = $resetPasswordHandler->findActor($email)) {
                if ($resetPasswordHandler->hasPendingToken($actor)) {
                    $this->addFlash('info', 'security.password_request.pending_token');

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
     * @Route("/request/check-email", name="app_actor_reset_password_check_email", methods="GET")
     */
    public function checkEmail(): Response
    {
        $this->denyAccessUnlessGranted('ACTOR_RESET_PASSWORD');

        return $this->render('actor/reset_password/check_email.html.twig');
    }

    /**
     * @Route(
     *     "/reset/{uuid}",
     *     name="app_actor_reset_password_reset",
     *     requirements={"uuid": "%pattern_uuid%"},
     *     methods={"GET", "POST"}
     * )
     */
    public function reset(
        Request $request,
        ActorResetPasswordToken $token,
        ResetPasswordHandler $resetPasswordHandler
    ): Response {
        $this->denyAccessUnlessGranted('ACTOR_RESET_PASSWORD');

        if ($token->isConsumed()) {
            $this->addFlash('info', 'security.password_reset.token_already_consumed');

            return $this->redirectToRoute('app_login');
        }

        if ($token->isExpired()) {
            $this->addFlash('info', 'security.password_reset.token_expired');

            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(PasswordType::class, $token->getActor());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $resetPasswordHandler->reset($token);

            $this->addFlash('info', 'actor.password_reset.success');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('actor/reset_password/reset.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
