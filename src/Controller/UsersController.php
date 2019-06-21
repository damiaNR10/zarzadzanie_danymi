<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\UserRepository;

class UsersController extends Controller
{
    /**
     * @Route("/users", name="users")
     */
    public function index( UserRepository $userRepository)
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
            'users' => $userRepository ->findAll()
        ]);
    }
}
