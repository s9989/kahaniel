<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

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
     * @param Document[] $collection
     */
    public static function groupByMonth(array $collection)
    {
        $grouped = [];
        foreach ($collection as $document) {
            $date = $document->getIssueDate();
            $m = $date->format('U');
            $grouped[$m][] = $document;
        }
        return $grouped;
    }
}
