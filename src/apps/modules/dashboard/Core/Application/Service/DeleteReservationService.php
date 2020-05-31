<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\DeleteReservationRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\IReservationRepository;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\ReservationID;

class DeleteReservationService
{
    protected $reservation_repo;

    public function __construct(IReservationRepository $reservation_repo)
    {
        $this->reservation_repo = $reservation_repo;
    }

    public function execute(DeleteReservationRequest $request)
    {
        $reservation = $this->reservation_repo->find(new ReservationID($request->reservation_id));
        $this->reservation_repo->delete($reservation);
    }
}
