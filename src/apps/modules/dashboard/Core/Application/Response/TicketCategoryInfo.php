<?php

namespace Its\Example\Dashboard\Core\Application\Response;

use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;

class TicketCategoryInfo
{
    public $id;
    public $type;
    public $price;
    public $total_amount;

    public function __construct(TicketCategory $ticket_category)
    {
        $this->id = $ticket_category->id->getString();
        $this->type = $ticket_category->type->getString();
        $this->price = $ticket_category->price->getValue();
        $this->total_amount = $ticket_category->total_amount->getValue();
    }
}