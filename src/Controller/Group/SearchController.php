<?php

namespace App\Controller\Group;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="app_group_search", methods="GET")
     */
    public function search(): Response
    {
        throw new \LogicException('To implement');
    }
}
