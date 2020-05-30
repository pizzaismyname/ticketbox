<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Reservation;

use Ramsey\Uuid\Uuid;

class TicketCode
{
    protected $code;

    public static function generate(): TicketCode
    {
        return new TicketCode(Uuid::uuid4()->toString());
    }

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function getString(): string
    {
        return $this->code;
    }
}
