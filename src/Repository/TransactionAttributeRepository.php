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
}
