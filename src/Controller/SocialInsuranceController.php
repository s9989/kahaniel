<?php

namespace App\Controller;

use App\Entity\SocialInsuranceBase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panel")
 */
class SocialInsuranceController extends AbstractController
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
