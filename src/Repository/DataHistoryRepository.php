<?php

namespace App\Repository;

use App\Entity\DataHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DataHistory>
 *
 * @method DataHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataHistory[]    findAll()
 * @method DataHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataHistory::class);
    }

//    /**
//     * @return DataHistory[] Returns an array of DataHistory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DataHistory
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
