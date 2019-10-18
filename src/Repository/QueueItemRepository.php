<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\QueueItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method QueueItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method QueueItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method QueueItem[]    findAll()
 * @method QueueItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QueueItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QueueItem::class);
    }

    /**
     * @return QueueItem[]
     */
    public function getOpenItems(int $items, string $source): array
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.source = :source')
            ->setParameter('source', $source)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults($items)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return QueueItem[] Returns an array of QueueItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QueueItem
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
