<?php

namespace App\DTOFactory\Response;


use App\DTO\Response\TransactionResponseDTO;
use App\DTOFactory\DTOFactory;
use App\Entity\Transaction;

class TransactionResponseDTOFactory implements DTOFactory
{
    /**
     * @var UserResponseDTOFactory
     */
    private $userResponseDTOFactory;

    public function __construct(UserResponseDTOFactory $userResponseDTOFactory)
    {
        $this->userResponseDTOFactory = $userResponseDTOFactory;
    }

    /**
     * @param Transaction[] $data
     *
     * @return TransactionResponseDTO[]
     */
    public function createDTOs(array $data): array
    {
        return array_map([$this, 'makeDTO'], $data);
    }

    /**
     * @param Transaction $data
     *
     * @return TransactionResponseDTO
     */
    public function createSingleDTO($data): TransactionResponseDTO
    {
        return $this->makeDTO($data, true);
    }

    /**
     * @param Transaction $transaction
     * @param bool $sideload
     *
     * @return TransactionResponseDTO
     */
    private function makeDTO(Transaction $transaction, bool $sideload = false): TransactionResponseDTO
    {
        return new TransactionResponseDTO(
            $transaction->getId(),
            $transaction->getProvider(),
            $transaction->getType(),
            $transaction->getAmount(),
            $transaction->getCurrency(),
            $sideload ? $this->userResponseDTOFactory->createSingleDTO($transaction->getUser()) : $transaction->getUser()->getId(),
            [],
            $transaction->getStartTime()->format('Y-m-d'),
            $transaction->getEndTime()->format('Y-m-d'),
            $transaction->getStatus()
        );
    }
}