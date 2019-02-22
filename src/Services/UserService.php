<?php

namespace App\Services;


use App\DTO\Request\UserRequestDTO;
use App\Entity\User;
use App\Repository\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param UserRequestDTO $DTO
     * @param bool $flush
     *
     * @return User
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function upsertUser(UserRequestDTO $DTO, bool $flush = true): User
    {
        $user = $this->repository->findOneBy(['email' => $DTO->getEmail()]);
        if (null === $user) {
            $user = new User();
        }

        $user
            ->setFirstName($DTO->getFirstName())
            ->setLastName($DTO->getLastName())
            ->setGender($DTO->getGender())
            ->setEmail($DTO->getEmail())
            ->setAddress($DTO->getAddress())
            ->setCity($DTO->getCity())
            ->setState($DTO->getState())
            ->setZip($DTO->getZip())
            ->setCountryCode($DTO->getCountryCode())
            ->setBirthday($DTO->getBirthday());

        return $this->repository->saveUser($user, $flush);
    }
}