<?php

namespace App\DTO;

final class MethodDTO
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string[]
     */
    private $types;

    /**
     * @var AdditionalDataFieldDTO[]
     */
    private $additionalData;

    /**
     * @param string $name
     * @param string $label
     * @param string[] $types
     * @param AdditionalDataFieldDTO[] $additionalData
     */
    public function __construct(
        string $name,
        string $label,
        array $types,
        array $additionalData = []
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->types = $types;
        $this->additionalData = $additionalData;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string[]
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @return AdditionalDataFieldDTO[]
     */
    public function getAdditionalData(): array
    {
        return $this->additionalData;
    }
}