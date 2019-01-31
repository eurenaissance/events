<?php

namespace App\Controller\Group;

use App\Entity\Group;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    /**
     * @Route("/{slug}", name="app_group_view", methods="GET")
     */
    public function view(Group $group): Response
    {
        $this->denyAccessUnlessGranted('GROUP_VIEW', $group);

        return $this->render('group/view/view.html.twig', [
            'group' => $group,
        ]);
    }
}
