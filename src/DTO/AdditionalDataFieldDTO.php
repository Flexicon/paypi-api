<?php

namespace App\DTO;

final class AdditionalDataFieldDTO
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
     * @var string
     */
    private $type;

    /**
     * @var bool
     */
    private $required;

    /**
     * @param string $name
     * @param string $label
     * @param string $type
     * @param bool $required
     */
    public function __construct(
        string $name,
        string $label,
        string $type,
        bool $required
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->required = $required;
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }
}