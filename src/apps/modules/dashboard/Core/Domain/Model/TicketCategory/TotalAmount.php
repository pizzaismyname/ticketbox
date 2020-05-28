<?php

namespace Its\Example\Dashboard\Core\Domain\Model\TicketCategory;

class TotalAmount
{
    protected $total_amount;

    public function __construct(int $total_amount)
    {
        $this->total_amount = $total_amount;
    }

    public function getValue(): int
    {
        return $this->total_amount;
    }
}
