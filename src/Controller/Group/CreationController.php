<?php

namespace App\Controller\Group;

use App\Entity\Group;
use App\Form\Group\CreationType;
use App\Group\CreationHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationController extends AbstractController
{
    /**
     * @Route("/group/create", name="app_group_creation_create", methods={"GET", "POST"})
     */
    public function create(Request $request, CreationHandler $creationHandler): Response
    {
        $this->denyAccessUnlessGranted('GROUP_CREATE');

        $form = $this->createForm(CreationType::class, $group = new Group());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $creationHandler->create($group);

            $this->addFlash('info', 'gruop.creation.create.flash.success');

            return $this->redirectToRoute('app_group_view', ['slug' => $group->getSlug()]);
        }

        return $this->render('group/creation/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
