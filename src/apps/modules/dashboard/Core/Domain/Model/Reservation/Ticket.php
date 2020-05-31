<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Reservation;

use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;

/**
 * @property-read TicketCode $code
 * @property-read TicketCategoryID $ticket_category_id
 */

class Ticket
{
    protected $code;
    protected $ticket_category_id;

    public static function create(TicketCode $code, TicketCategoryID $ticket_category_id): Ticket
    {
        return new Ticket($code, $ticket_category_id);
    }

    public function __construct(TicketCode $code, TicketCategoryID $ticket_category_id)
    {
        $this->code = $code;
        $this->ticket_category_id = $ticket_category_id;
    }

    public function getString(): string
    {
        return $this->code . "::" . $this->ticket_category_id;
    }
}
