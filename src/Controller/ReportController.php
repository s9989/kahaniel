<?php

namespace App\Controller;

use App\Entity\SocialInsuranceBase;
use App\Service\ReportService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReportController extends Controller
{
    /**
     * @Route("/reports", name="reports")
     */
    public function index(ReportService $reportService)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $reports = $reportService->getReports($this->getUser());

        return $this->render('report/index.html.twig', [
            'reports' => $reports,
        ]);
    }
}
