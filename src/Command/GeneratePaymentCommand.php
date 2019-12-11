<?php

namespace App\Command;

use App\Entity\Company;
use App\Entity\Document;
use App\Entity\Payment;
use App\Entity\SocialInsurancePayment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GeneratePaymentCommand extends Command
{
    protected static $defaultName = 'app:generate:payment';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription('Generuje płatności')
            ->addArgument('month', InputArgument::OPTIONAL, 'Miesiąc')
            ->addArgument('year', InputArgument::OPTIONAL, 'Rok')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $month = $input->getArgument('month') ?: (new \DateTime())->format('m');
        $year = $input->getArgument('year') ?: (new \DateTime())->format('Y');

        $companies = $this->em->getRepository(Company::class)->findAll();

        foreach ([Payment::VAT_TYPE, Payment::PIT_TYPE] as $type) {
            foreach ($companies as $company) {

                $payment = $this->em->getRepository(Payment::class)->findOneBy([
                    'month' => $month,
                    'year' => $year,
                    'company' => $company,
                    'type' => $type,
                ]);

                if (!$payment) {
                    $payment = new Payment();
                    $payment->setType($type);
                    $payment->setMonth($month);
                    $payment->setYear($year);
                    $payment->setCompany($company);
                }

                /* @var $profitDocuments Document[] */
                $profitDocuments = $this->em->getRepository(Document::class)->getMonthlyProfits($company, $month, $year);

                $profits = ['net' => 0, 'gross' => 0];
                $costs = ['net' => 0, 'gross' => 0];

                foreach ($profitDocuments as $document) {
                    $profits['net'] += $document->getNet();
                    $profits['gross'] += $document->getGross();
                }

                /* @var $costDocuments Document[] */
                $costDocuments = $this->em->getRepository(Document::class)->getMonthlyCosts($company, $month, $year);

                foreach ($costDocuments as $document) {
                    $costs['net'] += $document->getNet();
                    $costs['gross'] += $document->getGross();
                }

                if ($type == Payment::VAT_TYPE) {
                    $payment->setCosts($costs['gross'] - $costs['net']);
                } else {
                    $payment->setCosts($costs['net']);
                }

                if ($type == Payment::VAT_TYPE) {
                    $payment->setProfits($profits['gross'] - $profits['net']);
                } else {
                    $payment->setProfits($profits['net']);
                }

                $socialPayment = null;
                if ($type == Payment::PIT_TYPE) {
                    $socialPayment = $this->em->getRepository(SocialInsurancePayment::class)->findOneBy([
                        'company' => $company,
                        'year' => $year,
                        'month' => $month,
                    ]);
                }

                $payment->calculateTotal($socialPayment);

                $this->em->persist($payment);
            }
        }

        $this->em->flush();

        $io->success('Wygenerowano');

        return 0;
    }
}
