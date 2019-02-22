<?php

namespace App\DTO;


final class ListOrderDTO
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $direction;

    /**
     * @param string $key
     * @param string $direction
     */
    public function __construct(string $key, string $direction)
    {
        $this->key = $key;
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }
}
