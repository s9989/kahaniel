<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome()
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        return $this->render('welcome/index.html.twig', []);
    }

    /**
     * @Route("/", name="start")
     */
    public function start()
    {
        return $this->redirectToRoute('welcome');
    }

}