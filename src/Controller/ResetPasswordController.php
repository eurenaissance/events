<?php

namespace App\Controller;

use App\Actor\ResetPasswordHandler;
use App\Entity\ActorResetPasswordToken;
use App\Form\Actor\PasswordType;
use App\Form\Actor\ResetPasswordRequestType;
use App\Repository\ActorRepository;
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
     * @Route("/request", name="app_password_request", methods={"GET", "POST"})
     */
    public function request(
        Request $request,
        ActorRepository $actorRepository,
        ResetPasswordHandler $resetPasswordHandler
    ): Response {
        $form = $this->createForm(ResetPasswordRequestType::class);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $email = $form->get('emailAddress')->getData();

            if ($actor = $actorRepository->findOneByEmail($email)) {
                if ($resetPasswordHandler->hasPendingToken($actor)) {
                    $this->addFlash('info', 'actor.password_request.pending_token_exists');

                    return $this->redirectToRoute('app_login');
                }

                $resetPasswordHandler->request($actor);
            }

            return $this->redirectToRoute('app_password_request_check_email');
        }

        return $this->render('security/password_request.html.twig', [
            'legacy' => $request->query->getBoolean('legacy'),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/request/check-email", name="app_password_request_check_email", methods="GET")
     */
    public function checkEmail(): Response
    {
        return $this->render('security/password_request_check_email.html.twig');
    }

    /**
     * @Route("/reset/{uuid}", name="app_password_reset", methods={"GET", "POST"})
     */
    public function reset(
        Request $request,
        ActorResetPasswordToken $token,
        ResetPasswordHandler $resetPasswordHandler
    ): Response {
        if ($token->isConsumed()) {
            $this->addFlash('info', 'actor.password_reset.token_already_consumed');

            return $this->redirectToRoute('app_login');
        }

        if ($token->isExpired()) {
            $this->addFlash('info', 'actor.password_reset.token_expired');

            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(PasswordType::class, $token->getActor());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $resetPasswordHandler->reset($token);

            $this->addFlash('info', 'actor.password_reset.password_changed');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/password_reset.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
