<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PostRepository;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction( PostRepository $postRepository)
    {
        return $this->render('home.html.twig', [
          'controller_name' => 'BlogController',
            'posts' => $postRepository->findAll()
        ]);
    }
}
