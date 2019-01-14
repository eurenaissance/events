<?php

namespace App\Controller\Admin;

use App\Entity\Administrator;
use App\Security\QrCodeResponseFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_admin_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('sonata_admin_dashboard');
        }

        return $this->render('admin/security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/logout", name="app_admin_logout", methods="GET")
     */
    public function logout(): void
    {
    }

    /**
     * @Route("/qr-code/{id}", name="app_admin_qr_code", methods="GET")
     */
    public function qrCode(Administrator $administrator, QrCodeResponseFactory $qrCode): Response
    {
        return $qrCode->createResponseFor($administrator);
    }
}
