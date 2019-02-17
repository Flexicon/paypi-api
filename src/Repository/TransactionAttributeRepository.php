<?php

namespace App\Repository;

use App\Entity\TransactionAttribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TransactionAttribute|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransactionAttribute|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransactionAttribute[]    findAll()
 * @method TransactionAttribute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionAttributeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TransactionAttribute::class);
    }

    // /**
    //  * @return TransactionAttribute[] Returns an array of TransactionAttribute objects
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
    public function findOneBySomeField($value): ?TransactionAttribute
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
