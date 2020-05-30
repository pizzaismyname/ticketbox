<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Mapper;

use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Type;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Price;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TotalAmount;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\RemainingAmount;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\TicketCategoryRecord;

class TicketCategoryMapper
{
    public static function toTicketCategoryRecord(TicketCategory $ticket_category): TicketCategoryRecord
    {
        $ticket_category_record = new TicketCategoryRecord();
        $ticket_category_record->id = $ticket_category->id->getString();
        $ticket_category_record->type = $ticket_category->type->getString();
        $ticket_category_record->price = $ticket_category->price->getValue();
        $ticket_category_record->total_amount = $ticket_category->total_amount->getValue();

        return $ticket_category_record;
    }

    public static function toModel(TicketCategoryRecord $ticket_category_record): TicketCategory
    {
        return new TicketCategory(
            new TicketCategoryID($ticket_category_record->id),
            new Type($ticket_category_record->type),
            new Price($ticket_category_record->price),
            new TotalAmount($ticket_category_record->total_amount),
            new RemainingAmount($ticket_category_record->total_amount-$ticket_category_record->tickets->count())
        );
    }
}