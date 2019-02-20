<?php

namespace App\DTO\Response;

final class TransactionResponseDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $provider;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var UserResponseDTO|int
     */
    private $user;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @var string
     */
    private $startTime;

    /**
     * @var string
     */
    private $endTime;

    /**
     * @var string
     */
    private $status;


    /**
     * @param int $id
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