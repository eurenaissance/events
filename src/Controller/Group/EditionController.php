<?php

namespace App\Controller\Group;

use App\Entity\Group;
use App\Form\Group\EditionType;
use App\Group\EditionHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditionController extends AbstractController
{
    /**
     * @Route("/{slug}/edit", name="app_group_edit", methods={"GET", "POST"})
     * @Entity("group", expr="repository.findApprovedBySlug(slug)")
     */
    public function edit(Request $request, EditionHandler $editionHandler, Group $group): Response
    {
        $this->denyAccessUnlessGranted('GROUP_EDIT', $group);

        $form = $this->createForm(EditionType::class, $group);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $editionHandler->edit($group);

            return $this->redirectToRoute('app_group_view', ['slug' => $group->getSlug()]);
        }

        return $this->render('group/edition/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
