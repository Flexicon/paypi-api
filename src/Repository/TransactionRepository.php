<?php

namespace App\Repository;

use App\Entity\Transaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Transaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Transaction[]    findAll()
 * @method Transaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    /**
     * @param Transaction $transaction
     * @param bool $flush
     *
     * @return Transaction New entity
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function saveTransaction(Transaction $transaction, bool $flush = true): Transaction
    {
        $em = $this->getEntityManager();

        $em->persist($transaction);

        if ($flush) {
            $em->flush();
        }

        return $transaction;
    }
}
