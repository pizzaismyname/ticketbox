<?php

namespace Its\Example\Dashboard\Core\Application\Request;

class CreateReservationRequest
{
    public $customer_name;
    public $customer_email;
    public $ticket_category_id;
    public $ticket_amount;
}