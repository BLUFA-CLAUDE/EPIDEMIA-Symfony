<?php

namespace App\Repository;

use App\Entity\PointSurveillance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PointSurveillance|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointSurveillance|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointSurveillance[]    findAll()
 * @method PointSurveillance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointSurveillanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PointSurveillance::class);
    }

    // /**
    //  * @return PointSurveillance[] Returns an array of PointSurveillance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PointSurveillance
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
