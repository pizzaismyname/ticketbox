<?php

use Its\Example\Dashboard\Core\Domain\Exception\NotFoundException;
use Its\Example\Dashboard\Core\Domain\Interfaces\IReservationRepository;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Reservation;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\ReservationID;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\Customer;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\CustomerEmail;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\CustomerName;
use Phalcon\Di;
use PHPUnit\Framework\TestCase;

class ReservationRepositoryTest extends TestCase
{
    public static $repo;

    public static function setUpBeforeClass(): void
    {
        $di = Di::getDefault();
        /** @var IReservationRepository */
        self::$repo = $di->get('reservationRepository');
    }

    public function testCanBePersisted()
    {
        $reservation = new Reservation(new ReservationID('61435b5d-389f-4241-85f9-1c50d36a1c98'), Reservation::STATUS_PENDING, [], new Customer(new CustomerName("testcustomername"), new CustomerEmail("test.customer@email.com")), NULL);
        self::$repo->persist($reservation);
    }

    public function testCanBeDeleted()
    {
        $this->expectException(NotFoundException::class);

        $reservation = self::$repo->find(new ReservationID('61435b5d-389f-4241-85f9-1c50d36a1c98'));
        self::$repo->delete($reservation);

        $reservation = self::$repo->find(new ReservationID('61435b5d-389f-4241-85f9-1c50d36a1c98'));
    }
}
