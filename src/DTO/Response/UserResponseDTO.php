<?php

namespace App\DTO\Response;

use Symfony\Component\Serializer\Annotation\Groups;

final class UserResponseDTO
{
    /**
     * @Groups({"transaction.item"})
     *
     * @var int
     */
    private $id;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $firstName;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $lastName;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $gender;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $email;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $address;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $city;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $state;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $zip;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $countryCode;

    /**
     * @Groups({"transaction.item"})
     *
     * @var string
     */
    private $birthday;

    /**
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param string $email
     * @param string $address
     * @param string $city
     * @param string $state
     * @param string $zip
     * @param string $countryCode
     * @param string $birthday
     */
    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        string $gender,
        string $email,
        string $address,
        string $city,
        ?string $state,
        string $zip,
        string $countryCode,
        string $birthday
    )
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->countryCode = $countryCode;
        $this->birthday = $birthday;
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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }
}