<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Reservation;

use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;

/**
 * @property-read ReservationID $id
 * @property-read Status $status
 * @property-read Ticket[] $tickets
 * @property-read Customer $customer
 * @property-read Committee $committee
 */

class Reservation
{
    protected $id;
    protected $status;
    protected $tickets;
    protected $customer;
    protected $committee;

    public function __construct(ReservationID $id, Status $status, array $tickets, Customer $customer, Committee $committee)
    {
        $this->id = $id;
        $this->status = $status;
        $this->tickets = $tickets;
        $this->customer = $customer;
        $this->committee = $committee;
    }
}
