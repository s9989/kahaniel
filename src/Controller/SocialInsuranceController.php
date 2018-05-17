<?php

namespace App\Controller;

use App\Entity\SocialInsuranceBase;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SocialInsuranceController extends Controller
{
    /**
     * @Route("/social_insurance", name="social_insurance")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $bases = $em->getRepository(SocialInsuranceBase::class)->findByUser($user);

        return $this->render('social_insurance/index.html.twig', [
            'bases' => $bases,
        ]);
    }

    /**
     * @Route("/social_insurance_change", name="social_insurance_change")
     */
    public function action()
    {
        //@todo write code...
    }
}
