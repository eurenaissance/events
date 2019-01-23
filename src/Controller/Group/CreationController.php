<?php

namespace App\Controller\Group;

use App\Entity\Group;
use App\Form\Group\CreationType;
use App\Group\CreationHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/create-a-group")
 */
class CreationController extends AbstractController
{
    /**
     * @Route(name="app_group_creation_create", methods={"GET", "POST"})
     */
    public function create(Request $request, CreationHandler $creationHandler): Response
    {
        $form = $this->createForm(CreationType::class, $group = new Group());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $creationHandler->create($group);

            return $this->redirectToRoute('app_group_creation_success');
        }

        return $this->render('group/creation/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/success", name="app_group_creation_success", methods="GET")
     */
    public function success(): Response
    {
        return $this->render('group/creation/success.html.twig');
    }
}
