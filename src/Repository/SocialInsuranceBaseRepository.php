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
}
