<?php

namespace App\Repository;

use App\Entity\SkillTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SkillTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillTypes[]    findAll()
 * @method SkillTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillTypes::class);
    }

    // /**
    //  * @return SkillTypes[] Returns an array of SkillTypes objects
    //  */
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
    public function findOneBySomeField($value): ?SkillTypes
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
