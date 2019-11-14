<?php

namespace App\Controller;

use App\Service\ReportService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    /**
     * @Route("/reports", name="reports")
     */
    public function index(ReportService $reportService)
    {
        $reports = $reportService->getReports($this->getUser());

        return $this->render('report/index.html.twig', [
            'reports' => $reports,
        ]);
    }
}
