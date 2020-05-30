<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Reservation;

use Ramsey\Uuid\Uuid;

class ReservationID
{
    protected $guid;

    public static function generate(): ReservationId
    {
        return new ReservationID(Uuid::uuid4()->toString());
    }

    public function __construct(string $guid)
    {
        $this->guid = $guid;
    }

    public function getString(): string
    {
        return $this->guid;
    }
}