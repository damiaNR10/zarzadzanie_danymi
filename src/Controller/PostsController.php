<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Post;

/**
 * @Route("/posts")
 */
class PostsController extends Controller
{
    /**
     * @Route("/", name="posts")
     */
    public function index()
    {
        return $this->render('posts/index.html.twig', [
            'controller_name' => 'PostsController',
        ]);
    }
}
