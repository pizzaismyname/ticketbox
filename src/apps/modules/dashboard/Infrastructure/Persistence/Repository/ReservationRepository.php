<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Repository;

use Its\Example\Dashboard\Core\Domain\Exception\NotFoundException;
use Its\Example\Dashboard\Core\Domain\Interfaces\IReservationRepository;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Reservation;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\ReservationID;
use Its\Example\Dashboard\Infrastructure\Persistence\Mapper\ReservationMapper;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\ReservationRecord;
use Phalcon\Di\DiInterface;

class ReservationRepository implements IReservationRepository
{
    protected $di;
    protected $committee_repo;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
        $this->committee_repo = $this->di->get('committeeRepository');
    }

    public function find(ReservationID $reservation_id): Reservation
    {
        /** @var ReservationRecord */
        $reservation_record = ReservationRecord::findFirst([
            'conditions' => 'id = :id:',
            'bind' => [
                'id' => $reservation_id->getString()
            ]
        ]);

        if ($reservation_record == null)
            throw new NotFoundException;

        return ReservationMapper::toModel($reservation_record, $this->committee_repo);
    }

    public function all(): array
    {
        $reservation_records = ReservationRecord::find();

        $reservations = [];
        foreach ($reservation_records as $reservation_record) {
            $reservations[] = ReservationMapper::toModel($reservation_record, $this->committee_repo);
        }

        return $reservations;
    }

    public function persist(Reservation $reservation)
    {
        $reservation_record = ReservationMapper::toReservationRecord($reservation);
        $reservation_record->save();

        $reserved_tickets = ReservationMapper::toTicketRecord($reservation);
        foreach ($reserved_tickets as $reserved_ticket) {
            $reserved_ticket->save();
        }
    }

    public function delete(Reservation $reservation)
    {
        $reservation_record = ReservationMapper::toReservationRecord($reservation);
        $reservation_record->tickets->delete();
        $reservation_record->delete();
    }
}
