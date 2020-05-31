<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Response\TicketCategoryInfo;
use Its\Example\Dashboard\Core\Domain\Interfaces\ITicketCategoryRepository;

class ListTicketCategoryService
{
    protected $ticket_category_repo;

    public function __construct(ITicketCategoryRepository $ticket_category_repo)
    {
        $this->ticket_category_repo = $ticket_category_repo;
    }

    /** @return TicketCategoryInfo[] */
    public function execute(): array
    {
        $ticket_categories = [];
        foreach ($this->ticket_category_repo->all() as $ticket_category) {
            $ticket_category_info = new TicketCategoryInfo($ticket_category);
            $ticket_categories[] = $ticket_category_info;
        }
        return $ticket_categories;
    }
}
