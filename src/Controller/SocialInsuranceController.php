<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\SocialInsurancePayment;
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

        $company = $em->getRepository(Company::class)->findOneByOwner($this->getUser());
        $payments = $em->getRepository(SocialInsurancePayment::class)->findByCompany($company);

        return $this->render('social_insurance/index.html.twig', [
            'payments' => $payments,
        ]);
    }

}
