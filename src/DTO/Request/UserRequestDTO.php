<?php

namespace App\DTO\Request;

use Symfony\Component\Validator\Constraints as Assert;

final class UserRequestDTO
{
    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     *
     * @var string
     */
    private $firstName;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     *
     * @var string
     */
    private $lastName;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=1)
     *
     * @var string
     */
    private $gender;

    /**
     * @Assert\NotBlank
     * @Assert\Email
     * @Assert\Length(max=255)
     *
     * @var string
     */
    private $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     *
     * @var string
     */
    private $address;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     *
     * @var string
     */
    private $city;

    /**
     * @Assert\Length(max=255)
     *
     * @var string
     */
    private $state;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=255)
     *
     * @var string
     */
    private $zip;

    /**
     * @Assert\NotBlank
     * @Assert\Length(max=2)
     *
     * @var string
     */
    private $countryCode;

    /**
     * @Assert\NotBlank
     * @Assert\Date
     *
     * @var string
     */
    private $birthday;

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName($lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     *
     * @return self
     */
    public function setGender($gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return self
     */
    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return self
     */
    public function setCity($city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return self
     */
    public function setState($state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     *
     * @return self
     */
    public function setZip($zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     *
     * @return self
     */
    public function setCountryCode($countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     *
     * @return self
     */
    public function setBirthday($birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }
}