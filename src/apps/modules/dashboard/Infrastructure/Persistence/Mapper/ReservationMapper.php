<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Mapper;

use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Reservation;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\ReservationID;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Customer;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\CustomerName;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\CustomerEmail;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Ticket;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\TicketCode;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\ReservationRecord;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\TicketRecord;

class ReservationMapper
{
    public static function toReservationRecord(Reservation $reservation): ReservationRecord
    {
        $reservation_record = new ReservationRecord();
        $reservation_record->id = $reservation->id->getString();
        $reservation_record->status = $reservation->status;
        $reservation_record->customer_name = $reservation->customer->name->getString();
        $reservation_record->customer_email = $reservation->customer->email->getString();
        // MASIH RAGU
        if ($reservation->committee == NULL) {
            $reservation_record->id_committee = NULL;
        } else {
            $reservation_record->id_committee = $reservation->committee->id->getString();
        }

        return $reservation_record;
    }

    public static function toModel(ReservationRecord $reservation_record, ICommitteeRepository $committee_repo): Reservation
    {
        $ticket_records = $reservation_record->tickets;

        /** @var Ticket[] */
        $tickets = [];
        foreach ($ticket_records as $ticket_record) {
            /** @var TicketRecord $ticket_record */
            $tickets[] = new Ticket(
                new TicketCode($ticket_record->code),
                new TicketCategoryID($ticket_record->id_ticket_category)
            );
        }

        if ($reservation_record->id_committee == NULL) {
            $committee = NULL;
        } else {
            $committee = $committee_repo->find(new CommitteeID($reservation_record->id_committee));
        }

        return new Reservation(
            new ReservationID($reservation_record->id),
            $reservation_record->status,
            $tickets,
            new Customer(new CustomerName($reservation_record->customer_name), new CustomerEmail($reservation_record->customer_email)),
            $committee
        );
    }
}
