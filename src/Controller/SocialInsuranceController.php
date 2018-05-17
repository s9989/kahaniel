<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SocialInsuranceController extends Controller
{
    /**
     * @Route("/social_insurance", name="social_insurance")
     */
    public function index()
    {
        return $this->render('social_insurance/index.html.twig', [
            'controller_name' => 'SocialInsuranceController',
        ]);
    }
}
