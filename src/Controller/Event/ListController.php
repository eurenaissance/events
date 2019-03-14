<?php

namespace App\Controller\Event;

use App\Controller\Event\handler\EventHandler;
use App\Controller\Event\handler\TokenHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/event/list", name="app_api_events_list", methods="GET", condition="request.query.has('token')")
     */
    public function list(
        Request $request,
        TokenHandler $tokenHandler,
        EventHandler $eventHandler
    ): JsonResponse {
        if (!$tokenHandler->isTokenValid($request->query->get('token'))) {
            throw new BadRequestHttpException();
        }

        return $this->json($eventHandler->toEventSchema());
    }
}
