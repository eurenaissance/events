<?php

namespace App\Controller\Admin;

use App\Entity\Administrator;
use App\Form\AdministratorSetupType;
use App\Repository\AdministratorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdministratorSetupController extends AbstractController
{
    /**
     * @Route("/setup", name="app_admin_setup", methods={"GET", "POST"})
     */
    public function setup(Request $request, AdministratorRepository $administratorRepository): Response
    {
        if ($administratorRepository->hasAdministrator()) {
            return $this->redirectToRoute('app_admin_login', ['from_setup' => '1']);
        }

        $form = $this->createForm(AdministratorSetupType::class, $administrator = new Administrator());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($administrator);
            $manager->flush();

            return $this->redirectToRoute('app_admin_login', ['from_setup' => '1']);
        }

        return $this->render('admin/setup/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
