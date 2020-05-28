<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Record;

use Phalcon\Mvc\Model;

class TicketCategoryRecord extends Model
{
    public $id;
    public $type;
    public $price;
    public $total_amount;

    public function initialize()
    {
        $this->setConnectionService('db');
        $this->setSource('ticket_categories');

        $this->hasMany(
            'id',
            TicketRecord::class,
            'id_ticket_category',
            [
                'alias' => 'tickets'
            ]
        );
    }
}
