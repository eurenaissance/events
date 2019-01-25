<?php

namespace App\Controller\Admin;

use App\Entity\Administrator;
use App\Security\QrCodeResponseFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrator")
 */
class AdministratorController extends AbstractController
{
    /**
     * @Route("/qr-code/{id}", name="app_admin_qr_code", methods="GET")
     */
    public function qrCode(Administrator $administrator, QrCodeResponseFactory $qrCode): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN_ADMINISTRATORS');

        return $qrCode->createResponseFor($administrator);
    }
}
