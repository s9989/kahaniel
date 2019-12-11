<?php

namespace App\Repository;

use App\Entity\Company;
use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Exception;

/**
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Document::class);
    }

    /**
     * @param array $collection
     * @return array
     * @throws Exception
     */
    public static function groupByMonth(array $collection)
    {
        $grouped = [];
        foreach ($collection as $document) {
            $date = $document->getIssueDate();
            $m = (new \DateTime($date->format('Y/m/01')))->format('U');
            $grouped[$m][] = $document;
        }
        return $grouped;
    }

    /**
     * @param Company $company
     * @return mixed
     */
    public function getByCompany(Company $company)
    {
        $qb = $this->createQueryBuilder('d');
        $qb->select()
            ->orWhere('d.seller = :seller')
            ->orWhere('d.buyer = :buyer')
            ->setParameter('seller', $company)
            ->setParameter('buyer', $company)
        ;

        return $qb->getQuery()->execute();
    }

    /**
     * @param Company $company
     * @param int $month
     * @param int $year
     * @param int|null $category
     * @return mixed
     * @throws Exception
     */
    public function getMonthlyProfits(Company $company, int $month, int $year, int $category = null)
    {
        $qb = $this->getMonthlyDocumentsQueryBuilder($company, $month, $year, $category);
        $qb->andWhere('d.seller = :seller');
        $qb->setParameter('seller', $company);

        return $qb->getQuery()->execute();
    }

    /**
     * @param Company $company
     * @param int $month
     * @param int $year
     * @param int|null $category
     * @return mixed
     * @throws Exception
     */
    public function getMonthlyCosts(Company $company, int $month, int $year, int $category = null)
    {
        $qb = $this->getMonthlyDocumentsQueryBuilder($company, $month, $year, $category);
        $qb->andWhere('d.buyer = :buyer');
        $qb->setParameter('buyer', $company);


        return $qb->getQuery()->execute();
    }

    /**
     * @param Company $company
     * @param int $month
     * @param int $year
     * @param int|null $category
     * @return \Doctrine\ORM\QueryBuilder
     * @throws Exception
     */
    private function getMonthlyDocumentsQueryBuilder(Company $company, int $month, int $year, int $category = null)
    {
        $qb = $this->createQueryBuilder('d');
        $qb->select()
            ->andWhere('d.issueDate >= :month_start')
            ->andWhere('d.issueDate <= :month_end')
            ->setParameter('month_start', new \DateTime(sprintf("%s/%s/01 00:00:00", $year, $month)))
            ->setParameter('month_end', (new \DateTime(sprintf("%s/%s/01 23:59:59", $year, $month)))->modify("+1 month")->modify("-1 day"))
        ;

        if ($category) {
            $qb->andWhere('d.category = :category')->setParameter('category', $category);
        }

        return $qb;
    }
}
