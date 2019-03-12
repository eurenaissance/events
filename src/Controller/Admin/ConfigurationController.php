<?php

namespace App\Controller\Admin;

use App\Form\Admin\ConfigurationType;
use App\Repository\ConfigurationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfigurationController extends AbstractController
{
    /**
     * @Route("/app/configuration", name="app_admin_configuration", methods={"GET", "POST"})
     */
    public function list(Request $request, ConfigurationRepository $repository): Response
    {
        $form = $this->createForm(ConfigurationType::class, $repository->getConfiguration());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($form->getData());
            $manager->flush();

            $this->addFlash('info', 'admin.edit.flash.success');

            return $this->redirectToRoute('app_admin_configuration');
        }

        return $this->render('admin/administrator/configuration.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
