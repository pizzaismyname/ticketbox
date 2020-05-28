<?php

namespace Its\Example\Dashboard\Core\Domain\Model\TicketCategory;

class RemainingAmount
{
    protected $remaining_amount;

    public function __construct(int $remaining_amount)
    {
        $this->remaining_amount = $remaining_amount;
    }
}
