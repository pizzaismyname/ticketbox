<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Repository;

use Its\Example\Dashboard\Core\Domain\Exception\NotFoundException;
use Its\Example\Dashboard\Core\Domain\Interfaces\ITicketCategoryRepository;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;
use Its\Example\Dashboard\Infrastructure\Persistence\Mapper\TicketCategoryMapper;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\TicketCategoryRecord;
use Phalcon\Di\DiInterface;

class TicketCategoryRepository implements ITicketCategoryRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }

    public function find(TicketCategoryID $ticket_category_id): TicketCategory
    {
        /** @var TicketCategoryRecord */
        $ticket_category_record = TicketCategoryRecord::findFirst([
            'conditions' => 'id = :id:',
            'bind' => [
                'id' => $ticket_category_id->getString()
            ]
        ]);

        if ($ticket_category_record == null)
            throw new NotFoundException;

        return TicketCategoryMapper::toModel($ticket_category_record);
    }

    public function persist(TicketCategory $ticket_category)
    {
        $ticket_category_record = TicketCategoryMapper::toTicketCategoryRecord($ticket_category);
        $ticket_category_record->save();
    }

    public function delete(TicketCategory $ticket_category)
    {
        $ticket_category_record = TicketCategoryMapper::toTicketCategoryRecord($ticket_category);
        $ticket_category_record->delete();
    }
}