<?php

namespace App\Services;

use App\DTO\AdditionalDataFieldDTO;
use App\DTO\MethodDTO;

final class MethodsFromYmlProvider implements MethodsProvider
{
    /**
     * @var MethodDTO[]
     */
    private $methods;

    /**
     * @param array $available_methods
     */
    public function __construct($available_methods)
    {
        $this->methods = array_map([$this, 'makeDTO'], $available_methods);
    }

    /**
     * @return MethodDTO[]
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @param array $method
     *
     * @return MethodDTO
     */
    private function makeDTO($method): MethodDTO
    {
        /** @var AdditionalDataFieldDTO[] $additionalData */
        $additionalData = array_map([$this, 'makeAdditionalDataDTO'], $method['additionalData']);

        return new MethodDTO(
            $method['name'],
            $method['label'],
            $method['types'],
            $additionalData
        );
    }

    /**
     * @param array $data
     *
     * @return AdditionalDataFieldDTO
     */
    private function makeAdditionalDataDTO($data): AdditionalDataFieldDTO
    {
        return new AdditionalDataFieldDTO(
            $data['name'],
            $data['label'],
            $data['type'],
            $data['required']
        );
    }
}