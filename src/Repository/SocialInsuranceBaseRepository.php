<?php

namespace App\Repository;

use App\Entity\SocialInsuranceBase;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SocialInsuranceBase|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocialInsuranceBase|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocialInsuranceBase[]    findAll()
 * @method SocialInsuranceBase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialInsuranceBaseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SocialInsuranceBase::class);
    }

    public function findByUser(User $user)
    {
        $qb = $this->createQueryBuilder('sib')
            ->orderBy('sib.year, sib.month', 'DESC')
            ;

        if ($user->getStartDate()) {

            $month = $user->getStartDate()->format('m');
            $year = $user->getStartDate()->format('Y');

            $qb->andWhere('sib.year >= :year')
                ->andWhere('sib.month >= :month')
                ->setParameter('year', $year)
                ->setParameter('month', $month);
        }

        $currMonth = (new \DateTime("now"))->format('m');
        $currYear = (new \DateTime("now"))->format('Y');

        $qb->andWhere('sib.year <= :curr_year')
            ->andWhere('sib.month <= :curr_month')
            ->setParameter('curr_year', $currYear)
            ->setParameter('curr_month', $currMonth);

        return $qb->getQuery()->getResult();
    }
}
