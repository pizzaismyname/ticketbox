<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Record;

use Phalcon\Mvc\Model;

class TicketRecord extends Model
{
    public $code;
    public $id_ticket_category;
    public $id_reservation;

    public function initialize()
    {
        $this->setConnectionService('db');
        $this->setSource('tickets');
    }
}
