<?php

namespace Its\Example\Dashboard\Core\Domain\Model\TicketCategory;

use Its\Example\Dashboard\Core\Domain\Model\Reservation\Ticket;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\TicketCode;

/**
 * @property-read TicketCategoryID $id
 * @property-read Type $type
 * @property-read Price $price
 * @property-read TotalAmount $total_amount
 * @property-read RemainingAmount $remaining_amount
 */

class TicketCategory
{
    protected $id;
    protected $type;
    protected $price;
    protected $total_amount;
    protected $remaining_amount;

    public static function create(string $type, string $price, int $total_amount): TicketCategory
    {
        return new TicketCategory(TicketCategoryID::generate(), new Type($type), new Price($price), new TotalAmount($total_amount), new RemainingAmount($total_amount));
    }

    public function __construct(TicketCategoryID $id, Type $type, Price $price, TotalAmount $total_amount, RemainingAmount $remaining_amount)
    {
        $this->id = $id;
        $this->type = $type;
        $this->price = $price;
        $this->total_amount = $total_amount;
        $this->remaining_amount = $remaining_amount;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'id':
                return $this->id;
            case 'type':
                return $this->type;
            case 'price':
                return $this->price;
            case 'total_amount':
                return $this->total_amount;
            case 'remaining_amount':
                return $this->remaining_amount;
        }
    }

    public function changeType(Type $type)
    {
        $this->type = $type;
    }

    public function changePrice(Price $price)
    {
        $this->price = $price;
    }

    public function changeTotalAmount(TotalAmount $total_amount)
    {
        $this->total_amount = $total_amount;
    }

    public function isZero()
    {
        return $this->remaining_amount == new RemainingAmount(0);
    }

    public function generateTicket()
    {
        $this->remaining_amount--;
        return Ticket::create(TicketCode::generate(), $this->id);
    }
}
