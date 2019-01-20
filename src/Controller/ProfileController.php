<?php

namespace App\Controller;

use App\Actor\ChangePasswordHandler;
use App\Form\Actor\ProfileType;
use App\Form\Actor\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route(name="app_profile_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request): Response
    {
        $form = $this->createForm(ProfileType::class, $actor = $this->getUser());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($actor);
            $manager->flush();

            $this->addFlash('info', 'actor.profile.edited');

            return $this->redirectToRoute('app_profile_edit');
        }

        return $this->render('profile/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/password", name="app_profile_change_password", methods={"GET", "POST"})
     */
    public function changePassword(Request $request, ChangePasswordHandler $changePasswordHandler): Response
    {
        $form = $this->createForm(PasswordType::class, $actor = $this->getUser());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $changePasswordHandler->change($actor);

            $this->addFlash('info', 'actor.profile.password_changed');

            return $this->redirectToRoute('app_profile_edit');
        }

        return $this->render('profile/password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
