<?php

namespace App\Controller;

use App\Form\ActorResetPasswordRequestType;
use App\Repository\ActorRepository;
use App\Security\ActorResetPasswordHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login", methods={"GET", "POST"})
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/logout", name="app_logout", methods="GET")
     */
    public function logout(): void
    {
    }

    /**
     * @Route("/password/request", name="app_request_password", methods={"GET", "POST"})
     */
    public function requestNewPassword(
        Request $request,
        ActorRepository $actorRepository,
        ActorResetPasswordHandler $actorResetPasswordHandler
    ) {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_homepage');
        }

        $form = $this->createForm(ActorResetPasswordRequestType::class);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $email = $form->get('emailAddress')->getData();

            if ($actor = $actorRepository->findOneByEmail($email)) {
                $actorResetPasswordHandler->handleRequest($actor);
            }

            $this->addFlash('info', 'actor.reset_password.email_sent');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/request_password.html.twig', [
            'legacy' => $request->query->getBoolean('legacy'),
            'form' => $form->createView(),
        ]);
    }
}
