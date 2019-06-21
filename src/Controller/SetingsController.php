<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SetingsController extends Controller
{
    /**
     * @Route("/settings", name="setings")
     */
    public function index()
    {
        return $this->render('setings/index.html.twig', [
            'controller_name' => 'SetingsController',
        ]);
    }
}
