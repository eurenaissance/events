<?php

namespace App\Controller\Page;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/page")
 */
class PageController extends AbstractController
{
    /**
     * @Route("/legalities", name="app_page_legalities", methods={"GET"})
     */
    public function legalities(): Response
    {
        return $this->render('to_implement.html.twig');
    }

    /**
     * @Route("/terms", name="app_page_terms", methods={"GET"})
     */
    public function terms(): Response
    {
        return $this->render('to_implement.html.twig');
    }

    /**
     * @Route("/privacy", name="app_page_privacy", methods={"GET"})
     */
    public function privacy(): Response
    {
        return $this->render('to_implement.html.twig');
    }
}
