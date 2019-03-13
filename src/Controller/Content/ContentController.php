<?php

namespace App\Controller\Content;

use App\Controller\Content\Handler\ContentHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/page")
 */
class ContentController extends AbstractController
{
    /**
     * @var ContentHandler
     */
    private $contentHandler;

    public function __construct(ContentHandler $contentHandler)
    {
        $this->contentHandler = $contentHandler;
    }

    /**
     * @Route("/legalities", name="app_page_legalities", methods={"GET"})
     * @Route("/terms", name="app_page_terms", methods={"GET"})
     * @Route("/privacy", name="app_page_privacy", methods={"GET"})
     * @Route("/cookies", name="app_page_cookies", methods={"GET"})
     */
    public function content(Request $request): Response
    {
        return $this->contentHandler->handle($request);
    }
}
