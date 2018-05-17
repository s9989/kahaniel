<?php

namespace App\Repository;

use App\Entity\SocialInsuranceBase;
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

//    /**
//     * @return SocialInsuranceBase[] Returns an array of SocialInsuranceBase objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SocialInsuranceBase
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
