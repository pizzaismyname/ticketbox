<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Response\ReservationInfo;
use Its\Example\Dashboard\Core\Domain\Interfaces\IReservationRepository;

class ListReservationService
{
    protected $reservation_repo;

    public function __construct(IReservationRepository $reservation_repo)
    {
        $this->reservation_repo = $reservation_repo;
    }

    /** @return ReservationInfo[] */
    public function execute(): array
    {
        $reservations = [];
        foreach ($this->reservation_repo->all() as $reservation) {
            $reservation_info = new ReservationInfo($reservation);
            $reservations[] = $reservation_info;
        }
        return $reservations;
    }
}
