<?php

namespace App\Controller;

use App\Form\ProfileType;
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
     * @Route(name="app_profile")
     */
    public function profile(Request $request): Response
    {
        $form = $this->createForm(ProfileType::class, $actor = $this->getUser());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($actor);
            $manager->flush();

            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
