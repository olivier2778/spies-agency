<?php

namespace App\Repository;

use App\Entity\TypeHideaway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeHideaway|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeHideaway|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeHideaway[]    findAll()
 * @method TypeHideaway[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeHideawayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeHideaway::class);
    }

    // /**
    //  * @return TypeHideaway[] Returns an array of TypeHideaway objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeHideaway
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
