<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\ViewReservationStatusRequest;
use Its\Example\Dashboard\Core\Application\Response\TicketInfo;
use Its\Example\Dashboard\Core\Domain\Interfaces\IReservationRepository;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Reservation;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\ReservationID;

class ViewReservationStatusService
{
    protected $reservation_repo;

    public function __construct(IReservationRepository $reservation_repo)
    {
        $this->reservation_repo = $reservation_repo;
    }

    /** @return TicketInfo[] */
    public function execute(ViewReservationStatusRequest $request): array
    {
        $reservation = $this->reservation_repo->find(new ReservationID($request->reservation_id));
        if ($reservation->status == Reservation::STAT_PENDING) {
            return NULL;
        } elseif ($reservation->status == Reservation::STAT_VERIFIED) {
            $tickets = [];
            foreach ($reservation->tickets as $ticket) {
                $ticket_info = new TicketInfo();
                $ticket_info->ticket_code = $ticket->getString();
                $tickets[] = $ticket_info;
            }
            return $tickets;
        }
    }
}
