<?php

namespace App\Command;

use App\Entity\Company;
use App\Entity\SocialInsuranceBase;
use App\Entity\SocialInsurancePayment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GenerateSocialInsuranceCommand extends Command
{
    protected static $defaultName = 'app:generate:social-insurance';

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
            ->setDescription('Generowanie raportów ubezpiecznia społecznego i zdrowotnego')
            ->addArgument('month', InputArgument::OPTIONAL, 'Miesiąc')
            ->addArgument('year', InputArgument::OPTIONAL, 'Rok')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $month = $input->getArgument('month') ?: (new \DateTime())->format('m');
        $year = $input->getArgument('year') ?: (new \DateTime())->format('Y');

        $base = $this->em->getRepository(SocialInsuranceBase::class)->findOneBy([
            'month' => $month,
            'year' => $year,
        ]);

        /* @var $companies Company[] */
        $companies = $this->em->getRepository(Company::class)->findAll();

        foreach ($companies as $company) {

            $payment = new SocialInsurancePayment();
            $payment->setCompany($company);
            $payment->setSocialInsuranceBase($base);
            $payment->setYear($base->getYear());
            $payment->setMonth($base->getMonth());

            if ($company->getStartDate() < (new \DateTime(sprintf("%s/%s/01", $year, $month)))->modify("-2 year")) {
                $socialBaseValue = round($base->getPredictedSalary() * 60 / 100);
                $payment->setLabor(round($socialBaseValue * $base->getLaborPercent() / 10000));
            } else {
                $socialBaseValue = round($base->getMinimalSalary() * 30 / 100);
                $payment->setLabor(0);
            }

            $payment->setRetirement(round($socialBaseValue * $base->getRetirementPercent() / 10000));
            $payment->setOther(round($socialBaseValue * $base->getOtherPercent() / 10000));
            $payment->setAccident(round($socialBaseValue * $base->getAccidentPercent() / 10000));

            if ($company->isSicknessPayer()) {
                $payment->setSickness(round($socialBaseValue * $base->getSicknessPercent() / 10000));
            } else {
                $payment->setSickness(0);
            }

            $healthBaseValue = round($base->getAverageSalary() * 75 / 100);

            $payment->setHealth(round($healthBaseValue * $base->getHealthPercent() / 10000));

            $this->em->persist($payment);
        }

        $this->em->flush();

        $io->success('Wygenerowano');

        return 0;
    }
}
