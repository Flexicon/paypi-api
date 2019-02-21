<?php

namespace App\DTO\Response;


final class ListResponseDTO
{
    /**
     * @var PaginationResponseDTO
     */
    private $pagination;

    /**
     * @var array
     */
    private $data;

    /**
     * @param PaginationResponseDTO $pagination
     * @param array $data
     */
    public function __construct(PaginationResponseDTO $pagination, array $data)
    {
        $this->pagination = $pagination;
        $this->data = $data;
    }

    /**
     * @return PaginationResponseDTO
     */
    public function getPagination(): PaginationResponseDTO
    {
        return $this->pagination;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
