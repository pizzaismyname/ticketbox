<?php

namespace Its\Example\Dashboard\Core\Domain\Model\TicketCategory;

class Price
{
    protected $price;

    // format harga?

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function getValue(): float
    {
        return $this->price;
    }
}
