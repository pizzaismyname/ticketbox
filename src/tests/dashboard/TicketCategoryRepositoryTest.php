<?php

use Its\Example\Dashboard\Core\Domain\Exception\NotFoundException;
use Its\Example\Dashboard\Core\Domain\Interfaces\ITicketCategoryRepository;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Type;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Price;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TotalAmount;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\RemainingAmount;
use Phalcon\Di;
use PHPUnit\Framework\TestCase;

class TicketCategoryRepositoryTest extends TestCase
{
    public static $repo;

    public static function setUpBeforeClass(): void
    {
        $di = Di::getDefault();
        /** @var ITicketCategoryRepository */
        self::$repo = $di->get('ticketCategoryRepository');
    }

    public function testCanBePersisted()
    {
        $ticket_category = new TicketCategory(new TicketCategoryID('zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz'), new Type('Regular'), new Price('150000'), new TotalAmount('100'), new RemainingAmount('0'));

        self::$repo->persist($ticket_category);
    }

    public function testCanBeDeleted()
    {
        $this->expectException(NotFoundException::class);

        $ticket_category = self::$repo->find(new TicketCategoryID('zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz'));
        self::$repo->delete($ticket_category);
        $ticket_category = self::$repo->find(new TicketCategoryID('zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz'));
    }
}