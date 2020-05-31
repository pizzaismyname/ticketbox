<?php

namespace Its\Example\Dashboard\Core\Application\Response;

use Its\Example\Dashboard\Core\Domain\Model\Reservation\Ticket;


class TicketInfo
{
    public $ticket_code;

    public function __construct(Ticket $ticket)
    {
        $this->ticket_code = $ticket->getString();
    }
}