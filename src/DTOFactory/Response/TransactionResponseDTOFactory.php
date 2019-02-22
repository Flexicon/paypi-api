<?php

namespace App\DTOFactory\Response;


use App\DTO\Response\TransactionResponseDTO;
use App\DTOFactory\DTOFactory;
use App\Entity\Transaction;

class TransactionResponseDTOFactory implements DTOFactory
{
    const DATE_FORMAT = 'Y-m-d G:i:s';

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
        $user = $sideload
            ? $this->userResponseDTOFactory->createSingleDTO($transaction->getUser())
            : $transaction->getUser()->getId();

        return new TransactionResponseDTO(
            $transaction->getId(),
            $transaction->getProvider(),
            $transaction->getType(),
            $transaction->getAmount(),
            $transaction->getCurrency(),
            $user,
            [], // TODO:: Transaction attributes in Transaction DTO
            $transaction->getStartTime()->format(self::DATE_FORMAT),
            $transaction->getEndTime()->format(self::DATE_FORMAT),
            $transaction->getStatus()
        );
    }
}