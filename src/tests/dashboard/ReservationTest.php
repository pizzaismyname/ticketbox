<?php

use Its\Example\Dashboard\Core\Domain\Model\Reservation\Reservation;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\ReservationID;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Customer;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\CustomerEmail;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\CustomerName;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Ticket;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\TicketCode;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategory;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TicketCategoryID;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Price;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\RemainingAmount;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\TotalAmount;
use Its\Example\Dashboard\Core\Domain\Model\TicketCategory\Type;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Username;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Password;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class ReservationTest extends TestCase
{
    public function testReservationCanBeCreated()
    {
        $reservation = Reservation::create("testcustomername", "test.customer@email.com");

        $this->assertInstanceOf(Reservation::class, $reservation);
        $this->assertEquals(true, $reservation->status == Reservation::STAT_PENDING);
        $this->assertEquals(true, $reservation->tickets == []);
        $this->assertEquals(true, $reservation->committee == NULL);
    }

    public function testReservationCanBeInstantiated()
    {
        $reservation = new Reservation(
            new ReservationID(Uuid::uuid4()->toString()),
            Reservation::STAT_PENDING,
            [],
            new Customer(
                new CustomerName("testcustomername"),
                new CustomerEmail("test.customer@email.com")
            ),
            NULL
        );

        $this->assertInstanceOf(Reservation::class, $reservation);
    }

    public function testTicketCanBeReserved()
    {
        $ticket_category = new TicketCategory(
            new TicketCategoryID(Uuid::uuid4()->toString()),
            new Type("testtype"),
            new Price(50000),
            new TotalAmount(100),
            new RemainingAmount(100)
        );

        $reservation = new Reservation(
            new ReservationID(Uuid::uuid4()->toString()),
            Reservation::STAT_PENDING,
            [],
            new Customer(
                new CustomerName("testcustomername"),
                new CustomerEmail("test.customer@email.com")
            ),
            NULL
        );
        $reservation->reserveTicket(10, $ticket_category);

        $this->assertEquals(true, $ticket_category->remaining_amount == new RemainingAmount(100));
    }

    public function testReservationVerified()
    {
        $ticket_category = new TicketCategory(
            new TicketCategoryID(Uuid::uuid4()->toString()),
            new Type("testtype"),
            new Price(50000),
            new TotalAmount(100),
            new RemainingAmount(100)
        );

        $reservation = new Reservation(
            new ReservationID(Uuid::uuid4()->toString()),
            Reservation::STAT_PENDING,
            [],
            new Customer(
                new CustomerName("testcustomername"),
                new CustomerEmail("test.customer@email.com")
            ),
            NULL
        );
        $reservation->reserveTicket(10, $ticket_category);

        $committee = new Committee(
            new CommitteeID(Uuid::uuid4()->toString()),
            new Username("testusername"),
            Password::createFromString("anypassword")
        );
        $reservation->setVerificationByCommittee($committee);

        $this->assertEquals(true, $reservation->status == Reservation::STAT_VERIFIED);
        $this->assertEquals(true, $reservation->committee == $committee);
    }
}
