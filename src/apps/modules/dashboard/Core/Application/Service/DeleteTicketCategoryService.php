<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\DeleteTicketCategoryRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\ITicketCategoryRepository;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;

class DeleteTicketCategoryService
{
    protected $ticket_category_repo;

    public function __construct(ITicketCategoryRepository $ticket_category_repo)
    {
        $this->ticket_category_repo = $ticket_category_repo;
    }

    public function execute(DeleteTicketCategoryRequest $request)
    {
        $ticket_category = $this->ticket_category_repo->find(new TicketCategoryID($request->ticket_categoryee_id));
        $this->ticket_category_repo->delete($ticket_category);
    }
}