<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\ViewTicketCategoryRequest;
use Its\Example\Dashboard\Core\Application\Response\TicketCategoryInfo;
use Its\Example\Dashboard\Core\Domain\Interfaces\ITicketCategoryRepository;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;

class ViewTicketCategoryService
{
    protected $ticket_category_repo;

    public function __construct(ITicketCategoryRepository $ticket_category_repo)
    {
        $this->ticket_category_repo = $ticket_category_repo;
    }

    public function execute(ViewTicketCategoryRequest $request): TicketCategoryInfo
    {
        $ticket_category = $this->ticket_category_repo->find(new TicketCategoryID($request->ticket_category_id));
        return new TicketCategoryInfo($ticket_category);
    }
}
