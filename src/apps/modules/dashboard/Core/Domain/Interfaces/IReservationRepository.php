<?php

namespace Its\Example\Dashboard\Core\Domain\Interfaces;

use Its\Example\Dashboard\Core\Domain\Model\Reservation\Reservation;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\ReservationID;

interface IReservationRepository
{
    public function find(ReservationID $reservation_id): Reservation;
    public function all();
    public function persist(Reservation $reservation);
    public function delete(Reservation $reservation);
}
