<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\CreateTicketCategoryRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\ITicketCategoryRepository;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;

class CreateTicketCategoryService
{
    protected $ticket_category_repo;

    public function __construct(ITicketCategoryRepository $ticket_category_repo)
    {
        $this->ticket_category_repo = $ticket_category_repo;
    }

    public function execute(CreateTicketCategoryRequest $request)
    {
        $ticket_category = TicketCategory::create($request->type, $request->price, $request->total_amount);

        return $this->ticket_category_repo->persist($ticket_category);
    }
}