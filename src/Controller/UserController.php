<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/{id}", name="app_user_profile")
     */
    public function profileAction(User $user)
    {
        return $this->render('user/profile.html.twig', [
            'user' => $user,
        ]);
    }
}
