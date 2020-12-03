<?php

namespace App\Repository;

use App\Entity\ListeSouhait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeSouhait|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeSouhait|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeSouhait[]    findAll()
 * @method ListeSouhait[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeSouhaitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeSouhait::class);
    }

    // /**
    //  * @return ListeSouhait[] Returns an array of ListeSouhait objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeSouhait
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
