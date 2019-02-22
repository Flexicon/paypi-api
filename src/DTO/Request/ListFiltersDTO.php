<?php

namespace App\DTO\Request;


use App\DTO\ListOrderDTO;

final class ListFiltersDTO
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
     * @var ListOrderDTO
     */
    private $order;

    /**
     * @var string
     */
    private $filter;

    public function __construct(
        int $page,
        int $limit,
        string $order,
        ?string $filter
    )
    {
        $this->page = $page;
        $this->limit = $limit;
        $this->setOrder($order);
        $this->filter = $filter;
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
     * @return ListOrderDTO
     */
    public function getOrder(): ListOrderDTO
    {
        return $this->order;
    }

    /**
     * @param string $order
     */
    private function setOrder(string $order)
    {
        $orderParts = explode('_', $order);

        $this->order = new ListOrderDTO($orderParts[0], $orderParts[1]);
    }

    /**
     * @return string
     */
    public function getFilter(): ?string
    {
        return $this->filter;
    }
}
