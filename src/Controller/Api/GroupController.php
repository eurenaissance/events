<?php

namespace App\Controller\Api;

use App\Entity\Group;
use App\Geography\GroupRegistry\GroupRegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/group")
 */
class GroupController extends AbstractController
{
    /**
     * @Route(
     *     "/autocomplete/{terms}",
     *     name="app_api_group_autocomplete",
     *     requirements={"terms": "\w+"},
     *     methods="GET"
     * )
     */
    public function autocomplete(GroupRegistryInterface $registry, string $terms): JsonResponse
    {
        return $this->json($registry->findGroups($this->getUser(), $terms), 200, [], ['groups' => 'group_autocomplete']);
    }

    /**
     * @Route("/{uuid}", name="app_api_group_show", requirements={"uuid": "%pattern_uuid%"}, methods="GET")
     */
    public function show(Group $group): JsonResponse
    {
        return $this->json($group, 200, [], ['groups' => 'search']);
    }
}
