<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Form\RegistrationType;
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
    public function register(Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_profile');
        }

        $form = $this->createForm(RegistrationType::class, $actor = new Actor());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($actor);
            $manager->flush();

            return $this->redirectToRoute('app_registration_success');
        }

        return $this->render('registration/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/success", name="app_registration_success", methods="GET")
     */
    public function success(): Response
    {
        return $this->render('registration/success.html.twig');
    }
}
