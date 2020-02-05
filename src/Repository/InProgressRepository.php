<?php

namespace App\Repository;

use App\Entity\InProgress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method InProgress|null find($id, $lockMode = null, $lockVersion = null)
 * @method InProgress|null findOneBy(array $criteria, array $orderBy = null)
 * @method InProgress[]    findAll()
 * @method InProgress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InProgressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InProgress::class);
    }

    // /**
    //  * @return InProgress[] Returns an array of InProgress objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InProgress
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
