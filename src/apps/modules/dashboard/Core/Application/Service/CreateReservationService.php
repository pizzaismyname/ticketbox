<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\CreateReservationRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\IReservationRepository;
use Its\Example\Dashboard\Core\Domain\Interfaces\ITicketCategoryRepository;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Reservation;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;

class CreateReservationService
{
    protected $reservation_repo;
    protected $ticket_category_repo;

    public function __construct(IReservationRepository $reservation_repo, ITicketCategoryRepository $ticket_category_repo)
    {
        $this->reservation_repo = $reservation_repo;
        $this->ticket_category_repo = $ticket_category_repo;
    }

    public function execute(CreateReservationRequest $request)
    {
        $request_ticket_category = $this->ticket_category_repo->find(new TicketCategoryID($request->ticket_category_id));

        $reservation = Reservation::create($request->customer_name, $request->customer_email);

        $reservation->reserveTicket($request->ticket_amount, $request_ticket_category);

        return $this->reservation_repo->persist($reservation);
    }
}
