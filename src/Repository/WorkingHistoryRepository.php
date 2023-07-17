<?php

namespace App\Repository;

use App\Entity\WorkingHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkingHistory>
 *
 * @method WorkingHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkingHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkingHistory[]    findAll()
 * @method WorkingHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkingHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkingHistory::class);
    }

//    /**
//     * @return WorkingHistory[] Returns an array of WorkingHistory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WorkingHistory
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
