<?php

namespace App\Repository;

use App\Entity\SocialInsurancePayment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SocialInsurancePayment|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocialInsurancePayment|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocialInsurancePayment[]    findAll()
 * @method SocialInsurancePayment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialInsurancePaymentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SocialInsurancePayment::class);
    }
}
