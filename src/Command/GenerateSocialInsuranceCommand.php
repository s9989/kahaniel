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
        $month = $input->getArgument('month');
        $year = $input->getArgument('year');

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

            if ($company->getStartDate() < new \DateTime("-2 year")) {
                $socialBaseValue = floor($base->getAverageSalary() * 60 / 100);
                $payment->setLabor(floor($socialBaseValue * $base->getLaborPercent() / 10000));
            } else {
                $socialBaseValue = floor($base->getMinimalSalary() * 30 / 100);
                $payment->setLabor(0);
            }

            $payment->setRetirement($socialBaseValue * $base->getRetirementPercent() / 10000);
            $payment->setOther($socialBaseValue * $base->getOtherPercent() / 10000);
            $payment->setAccident($socialBaseValue * $base->getAccidentPercent() / 10000);

            if ($company->isSicknessPayer()) {
                $payment->setSickness($socialBaseValue * $base->getSicknessPercent() / 10000);
            } else {
                $payment->setSickness(0);
            }

            $healthBaseValue = floor($base->getAverageSalary() * 75 / 100);

            $payment->setHealth($healthBaseValue * $base->getHealthPercent());

            $this->em->persist($payment);
        }

        $this->em->flush();

        $io->success('Wygenerowano');

        return 0;
    }
}
