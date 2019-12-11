<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Payment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    /**
     * @Route("/reports", name="reports")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $company = $em->getRepository(Company::class)->findOneByOwner($this->getUser());
        $payments = $em->getRepository(Payment::class)->findByCompany($company);

        return $this->render('report/index.html.twig', [
            'payments' => $payments,
        ]);
    }
}
