<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\EditTicketCategoryRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\ITicketCategoryRepository;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Type;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Price;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TotalAmount;

class EditTicketCategoryService
{
    protected $ticket_category_repo;

    public function __construct(ITicketCategoryRepository $ticket_category_repo)
    {
        $this->ticket_category_repo = $ticket_category_repo;
    }

    public function execute(EditTicketCategoryRequest $request)
    {
        $ticket_category = $this->ticket_category_repo->find(new TicketCategoryID($request->ticket_categoryee_id));

        if ($request->type != null) {
            $ticket_category->changeType(new Type($request->type));
        }

        if ($request->price != null) {
            $ticket_category->changePrice(new Price($request->price));
        }

        if ($request->total_amount != null) {
            $ticket_category->changeTotalAmount(new TotalAmount($request->total_amount));
        }

        return $this->ticket_category_repo->persist($ticket_category);
    }
}
