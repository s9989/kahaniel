<?php

namespace App\Service;

use App\Entity\Document;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ReportService
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getReports(User $user)
    {
        $profits = $this->em->getRepository(Document::class)->findBy(['type' => Document::PROFIT_TYPE]);
        $costs = $this->em->getRepository(Document::class)->findBy(['type' => Document::COST_TYPE]);

        $reports = [];

        foreach ($profits as $profit) {
            $Ym = $profit->getIssueDate()->format('Y-m');
            $reports[$Ym]['fullMonth'] = $profit->getIssueDate()->format('F, Y');
            $reports[$Ym]['profits'][] = $profit;

            if (!isset($reports[$Ym]['profits_net'])) {
                $reports[$Ym]['profits_net'] = 0;
                $reports[$Ym]['profits_gross'] = 0;
            }

            $reports[$Ym]['profits_net'] += $profit->getNet();
            $reports[$Ym]['profits_gross'] += $profit->getGross();
        }

        foreach ($costs as $cost) {
            $Ym = $cost->getIssueDate()->format('Y-m');
            $reports[$Ym]['fullMonth'] = $cost->getIssueDate()->format('F, Y');
            $reports[$Ym]['costs'][] = $cost;

            if (!isset($reports[$Ym]['costs_net'])) {
                $reports[$Ym]['costs_net'] = 0;
                $reports[$Ym]['costs_gross'] = 0;
            }

            $reports[$Ym]['costs_net'] += $cost->getNet();
            $reports[$Ym]['costs_gross'] += $cost->getGross();
        }

        return $reports;
    }
}