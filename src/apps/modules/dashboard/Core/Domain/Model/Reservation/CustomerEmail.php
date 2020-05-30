<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Reservation;


class CustomerEmail
{
    protected $email;

    // format email?

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getString(): string
    {
        return $this->email;
    }
}
