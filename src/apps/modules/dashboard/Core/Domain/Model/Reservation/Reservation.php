<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Reservation;

use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;

/**
 * @property-read ReservationID $id
 * @property-read string $status
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

    const STAT_PENDING = "PENDING";
    const STAT_VERIFIED = "VERIFIED";

    public static function create(string $customer_name, string $customer_email): Reservation
    {
        return new Reservation(ReservationID::generate(), self::STAT_PENDING, [], new Customer(new CustomerName($customer_name), new CustomerEmail($customer_email)), NULL);
    }

    /** @param Ticket[] $tickets */
    public function __construct(ReservationID $id, string $status, array $tickets, Customer $customer, ?Committee $committee)
    {
        $this->id = $id;
        $this->status = $status;
        $this->tickets = $tickets;
        $this->customer = $customer;
        $this->committee = $committee;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'id':
                return $this->id;
            case 'status':
                return $this->status;
            case 'tickets':
                return $this->tickets;
            case 'customer':
                return $this->customer;
            case 'committee':
                return $this->committee;
        }
    }

    public function reserveTicket(int $input_amount, TicketCategory $input_ticket_category)
    {
        while ($input_amount > 0) {
            if ($input_ticket_category->isZero()) {
                throw new Exception;
            } else {
                $reserved_ticket = $input_ticket_category->generateTicket();
                $this->tickets[] = $reserved_ticket;
                $input_amount--;
            }
        }
    }

    public function setVerificationByCommittee(Committee $committee)
    {
        $this->status = self::STAT_VERIFIED;
        $this->committee = $committee;
    }
}
