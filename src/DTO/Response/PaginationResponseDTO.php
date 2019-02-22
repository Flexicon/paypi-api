<?php

namespace App\DTO\Response;


use App\DTO\ListOrderDTO;

final class PaginationResponseDTO
{
    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $total;

    /**
     * @var ListOrderDTO
     */
    private $order;

    /**
     * PaginationResponseDTO constructor.
     * @param int $page
     * @param int $limit
     * @param int $total
     * @param ListOrderDTO $order
     */
    public function __construct(
        int $page,
        int $limit,
        int $total,
        ListOrderDTO $order
    )
    {
        $this->page = $page;
        $this->limit = $limit;
        $this->total = $total;
        $this->order = $order;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return array
     */
    public function getOrder(): array
    {
        return [$this->order->getKey() => $this->order->getDirection()];
    }
}
