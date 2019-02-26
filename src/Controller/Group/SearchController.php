<?php

namespace App\Controller\Group;

use App\Group\SearchHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="app_group_search", methods="GET")
     */
    public function search(Request $request, SearchHandler $searchHandler): Response
    {
        $this->denyAccessUnlessGranted('GROUP_SEARCH');

        return $this->render('group/search/search.html.twig', [
            'results' => $searchHandler->search($request),
        ]);
    }
}
