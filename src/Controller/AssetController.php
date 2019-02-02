<?php

namespace App\Controller;

use App\ImageProvider\ImageRequestHandlerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/asset")
 */
class AssetController extends AbstractController
{
    /**
     * @Route("/image/{path}", requirements={"path"=".+"}, name="asset_image")
     */
    public function image(Request $request, string $path, ImageRequestHandlerInterface $handler)
    {
        return $handler->handleRequest($path, $request->query->all());
    }
}
