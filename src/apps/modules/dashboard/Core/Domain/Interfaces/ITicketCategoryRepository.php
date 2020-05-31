<?php

namespace Its\Example\Dashboard\Core\Domain\Interfaces;

use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;

interface ITicketCategoryRepository
{
    public function find(TicketCategoryID $ticket_category_id): TicketCategory;
    public function all();
    public function persist(TicketCategory $ticket_category);
    public function delete(TicketCategory $ticket_category);
}
