<?php

namespace App\Services;


use App\Dictionary\TransactionStatusDictionary;
use App\DTO\Request\ListFiltersDTO;
use App\DTO\Request\TransactionRequestDTO;
use App\Entity\Transaction;
use App\Repository\TransactionRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class TransactionService
{
    /**
     * @var TransactionRepository
     */
    private $repository;

    /**
     * @var UserService
     */
    private $userService;

    public function __construct(
        TransactionRepository $repository,
        UserService $userService
    )
    {
        $this->repository = $repository;
        $this->userService = $userService;
    }

    /**
     * @param ListFiltersDTO $filtersDTO
     *
     * @return Paginator
     */
    public function getTransactionsListPaginator(ListFiltersDTO $filtersDTO): Paginator
    {
        $page = $filtersDTO->getPage();
        $limit = $filtersDTO->getLimit();
        $order = $filtersDTO->getOrder();
        $filter = $filtersDTO->getFilter();

        $queryBuilder = $this->repository->createQueryBuilder('t')
            ->orderBy('t.' . $order->getKey(), $order->getDirection());

        if ($filter) {
            $queryBuilder
                ->andWhere('t.status = :status')
                ->setParameter('status', $filter);
        }

        $query = $queryBuilder
            ->getQuery()
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);

        $paginator = new Paginator($query, $fetchJoinCollection = true);

        return $paginator;
    }

    /**
     * @param TransactionRequestDTO $DTO
     * @param bool $flush
     *
     * @return Transaction Entity
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function createTransaction(TransactionRequestDTO $DTO, bool $flush = true): Transaction
    {
        // Initiate transaction entity with base data
        $transaction = (new Transaction())
            ->setProvider($DTO->getProvider())
            ->setType($DTO->getType())
            ->setAmount($DTO->getAmount())
            ->setCurrency($DTO->getCurrency());

        // Prepare the user entity
        $user = $this->userService->upsertUser($DTO->getUser(), false);
        $transaction->setUser($user);

        // Setup startTime, endTime and status
        $this->assignStartAndEndTimes($transaction);
        $transaction->setStatus($this->getRandomStatus());

        $this->repository->saveTransaction($transaction, $flush);

        return $transaction;
    }

    /**
     * @param Transaction $transaction
     *
     * @throws \Exception
     */
    private function assignStartAndEndTimes(Transaction $transaction): void
    {
        $start = new \DateTime('now');
        $end = new \DateTime('now');
        $end->add(new \DateInterval('PT2S'));

        $transaction
            ->setStartTime($start)
            ->setEndTime($end);
    }

    /**
     * @return string
     */
    private function getRandomStatus(): string
    {
        $statuses = [TransactionStatusDictionary::SUCCESS, TransactionStatusDictionary::FAILED, TransactionStatusDictionary::ERROR];
        $randKey = array_rand($statuses);

        return $statuses[$randKey];
    }
}
