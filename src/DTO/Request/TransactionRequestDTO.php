<?php

namespace App\DTO\Request;

use Symfony\Component\Validator\Constraints as Assert;

final class TransactionRequestDTO
{
    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     *
     * @var string
     */
    private $provider;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=10)
     *
     * @var string
     */
    private $type;

    /**
     * @Assert\NotBlank
     *
     * @var int
     */
    private $amount;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=3)
     *
     * @var string
     */
    private $currency;

    /**
     * @Assert\Valid
     *
     * @var UserRequestDTO
     */
    private $user;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @return string
     */
    public function getProvider(): ?string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     *
     * @return self
     */
    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return self
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return UserRequestDTO
     */
    public function getUser(): ?UserRequestDTO
    {
        return $this->user;
    }

    /**
     * @param UserRequestDTO $user
     *
     * @return self
     */
    public function setUser(UserRequestDTO $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }
}