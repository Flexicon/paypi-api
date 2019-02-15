<?php

namespace App\Services;

use App\DTO\MethodDTO;

final class MethodsFromYmlProvider implements MethodsProvider
{
    /**
     * @var MethodDTO[]
     */
    private $methods;

    public function __construct()
    {
        // TODO:: Read methods from yml file here
        $this->methods = [];
    }

    public function getMethods(): array
    {
        return $this->methods;
    }
}