<?php

namespace App\Controller\Actor;

use App\Actor\NotificationHandler;
use App\Actor\ProfileHandler;
use App\Form\Actor\ChangePasswordType;
use App\Form\Actor\NotificationType;
use App\Form\Actor\ProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route(name="app_actor_profile_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request): Response
    {
        $form = $this->createForm(ProfileType::class, $actor = $this->getUser());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();

            $manager->persist($actor);
            $manager->flush();

            $this->addFlash('success', 'flashes.profile.account_success');

            return $this->redirectToRoute('app_actor_profile_edit');
        }

        return $this->render('actor/profile/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/change-password", name="app_actor_profile_change_password", methods={"GET", "POST"})
     */
    public function changePassword(Request $request, ProfileHandler $changePasswordHandler): Response
    {
        $form = $this->createForm(ChangePasswordType::class, $actor = $this->getUser());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $changePasswordHandler->changePassword($actor);

            $this->addFlash('success', 'flashes.profile.password_success');

            return $this->redirectToRoute('app_actor_profile_edit');
        }

        return $this->render('actor/profile/change_password.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/notifications", name="app_actor_profile_notifications", methods={"GET", "POST"})
     */
    public function notifications(Request $request, NotificationHandler $notificationHandler): Response
    {
        $form = $this->createForm(NotificationType::class, $actor = $this->getUser());

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $notificationEnabled = (bool) $form->get('notificationEnabled')->getData();

            $notificationHandler->changeNotification($actor, $notificationEnabled);

            $this->addFlash('success', 'flashes.profile.notification_success');

            return $this->redirectToRoute('app_actor_profile_notifications');
        }

        return $this->render('actor/profile/notification.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
