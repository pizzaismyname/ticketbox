<?php

use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Type;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Price;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\RemainingAmount;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TotalAmount;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class TicketCategoryTest extends TestCase
{
    public function testCanBeCreated()
    {
        $ticket_category = TicketCategory::create("testtype", "100000", "100");

        $this->assertInstanceOf(TicketCategory::class, $ticket_category);

        $this->assertEquals(true, $ticket_category->remaining_amount == new RemainingAmount("100"));
    }

    public function testCanBeInstantiated()
    {
        $ticket_category = new TicketCategory(new TicketCategoryID(Uuid::uuid4()->toString()), new Type("validtype"), new Price("50000"), new TotalAmount("1000"), new RemainingAmount("1000"));

        $this->assertInstanceOf(TicketCategory::class, $ticket_category);
    }

    public function testTypeCanBeChanged()
    {
        $ticket_category = new TicketCategory(new TicketCategoryID(Uuid::uuid4()->toString()), new Type("validtype"), new Price("50000"), new TotalAmount("1000"), new RemainingAmount("1000"));

        $ticket_category->changeType(new Type("anothertype"));

        $this->assertEquals(true, $ticket_category->type == new Type("anothertype"));
    }

    public function testPriceCanBeChanged()
    {
        $ticket_category = new TicketCategory(new TicketCategoryID(Uuid::uuid4()->toString()), new Type("validtype"), new Price("50000"), new TotalAmount("1000"), new RemainingAmount("1000"));

        $ticket_category->changePrice(new Price("100000"));

        $this->assertEquals(true, $ticket_category->price == new Price("100000"));
    }

    public function testTotalAmountCanBeChanged()
    {
        $ticket_category = new TicketCategory(new TicketCategoryID(Uuid::uuid4()->toString()), new Type("validtype"), new Price("50000"), new TotalAmount("1000"), new RemainingAmount("1000"));

        $ticket_category->changeTotalAmount(new TotalAmount("500"));

        $this->assertEquals(true, $ticket_category->total_amount == new TotalAmount("500"));
    }
}
