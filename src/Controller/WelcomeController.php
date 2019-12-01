<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index()
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        return $this->render('welcome/index.html.twig', []);
    }

}