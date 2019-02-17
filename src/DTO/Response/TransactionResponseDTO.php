<?php

namespace App\DTO\Response;

use Symfony\Component\Serializer\Annotation\Groups;

final class TransactionResponseDTO
{
    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var int
     */
    private $id;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var string
     */
    private $provider;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var string
     */
    private $type;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var int
     */
    private $amount;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var string
     */
    private $currency;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var UserResponseDTO|int
     */
    private $user;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var array
     */
    private $attributes;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var string
     */
    private $startTime;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var string
     */
    private $endTime;

    /**
     * @Groups({"transaction.item", "transaction.list"})
     *
     * @var string
     */
    private $status;


    /**
     * @param string $provider
     * @param string $type
     * @param int $amount
     * @param string $currency
     * @param UserResponseDTO|int $user
     * @param array $attributes
     * @param string $startTime
     * @param string $endTime
     * @param string $status
     */
    public function __construct(
        int $id,
        string $provider,
        string $type,
        int $amount,
        string $currency,
        $user,
        array $attributes,
        string $startTime,
        string $endTime,
        string $status
    )
    {
        $this->id = $id;
        $this->provider = $provider;
        $this->type = $type;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->user = $user;
        $this->attributes = $attributes;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getProvider(): ?string
    {
        return $this->provider;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return UserResponseDTO|int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getStartTime(): ?string
    {
        return $this->startTime;
    }

    /**
     * @return string
     */
    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
}