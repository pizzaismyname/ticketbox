<?php

namespace Its\Example\Dashboard\Core\Application\Response;

use Its\Example\Dashboard\Core\Domain\Model\Reservation\Reservation;

class ReservationInfo
{
    public $id;
    public $status;
    public $customer_name;
    public $customer_email;
    public $id_committee;

    public function __construct(Reservation $reservation)
    {
        $this->id = $reservation->id->getString();
        $this->status = $reservation->status;
        $this->customer_name = $reservation->customer->name->getString();
        $this->customer_email = $reservation->customer->email->getString();
        if ($reservation->committee == NULL) {
            $this->id_committee->id_committee = NULL;
        } else {
            $this->id_committee = $reservation->committee->id->getString();
        }
    }
}
