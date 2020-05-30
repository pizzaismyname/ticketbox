<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Reservation;


class CustomerName
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getString(): string
    {
        return $this->name;
    }
}
