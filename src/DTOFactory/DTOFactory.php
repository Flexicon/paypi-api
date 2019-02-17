<?php

namespace App\DTOFactory;

interface DTOFactory
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function createDTOs(array $data): array;

    /**
     * @param $data
     *
     * @return mixed
     */
    public function createSingleDTO($data);
}
