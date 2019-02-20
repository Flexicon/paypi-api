<?php

namespace App\DTOFactory\Response;


use App\DTO\Response\UserResponseDTO;
use App\DTOFactory\DTOFactory;
use App\Entity\User;

class UserResponseDTOFactory implements DTOFactory
{
    const DATE_FORMAT = 'Y-m-d G:i:s';

    /**
     * @param User[] $data
     *
     * @return UserResponseDTO[]
     */
    public function createDTOs(array $data): array
    {
        return array_map([$this, 'makeDTO'], $data);
    }

    /**
     * @param User $data
     *
     * @return UserResponseDTO
     */
    public function createSingleDTO($data): UserResponseDTO
    {
        return $this->makeDTO($data);
    }

    /**
     * @param User $user
     *
     * @return UserResponseDTO
     */
    private function makeDTO(User $user): UserResponseDTO
    {
        return new UserResponseDTO(
            $user->getId(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getGender(),
            $user->getEmail(),
            $user->getAddress(),
            $user->getCity(),
            $user->getState(),
            $user->getZip(),
            $user->getCountryCode(),
            $user->getBirthday()->format(self::DATE_FORMAT)
        );
    }
}