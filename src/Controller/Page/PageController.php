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
        throw new \Exception('not implemented yet...');
    }

    /**
     * @Route("/terms", name="app_page_terms", methods={"GET"})
     */
    public function terms(): Response
    {
        throw new \Exception('not implemented yet...');
    }

    /**
     * @Route("/privacy", name="app_page_privacy", methods={"GET"})
     */
    public function privacy(): Response
    {
        throw new \Exception('not implemented yet...');
    }
}
