<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Record;

use Phalcon\Mvc\Model;

class ReservationRecord extends Model
{
    public $id;
    public $status;
    public $customer_name;
    public $customer_email;
    public $id_committee;

    public function initialize()
    {
        $this->setConnectionService('db');
        $this->setSource('reservations');

        $this->hasMany(
            'id',
            TicketRecord::class,
            'id_reservation',
            [
                'alias' => 'tickets'
            ]
        );
    }
}
