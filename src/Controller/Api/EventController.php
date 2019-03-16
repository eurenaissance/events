<?php

namespace App\Controller\Api;

use App\Api\TokenValidator;
use App\Event\ApiHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/events")
 */
class EventController extends AbstractController
{
    /**
     * @Route("/all", name="app_api_events_all", methods="GET")
     */
    public function all(TokenValidator $validator, ApiHandler $api, Request $request): JsonResponse
    {
        $validator->denyAccessUnlessValidToken($request->query->get('token'));

        return $this->json($api->toEventSchema());
    }
}
