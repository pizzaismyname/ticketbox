<?php

namespace Its\Example\Dashboard\Core\Domain\Model\TicketCategory;

/**
 * @property-read CategoryID $id
 * @property-read CategoryName $category_name
 * @property-read Price $price
 * @property-read TotalAmount $total_amount
 * @property-read RemainingAmount $remaining_amount
 */

class TicketCategory
{
    protected $id;
    protected $category_name;
    protected $price;
    protected $total_amount;
    protected $remaining_amount;

    public function __construct(CategoryID $id, CategoryName $category_name, Price $price, AmountTicket $total_amount, RemainingTicket $remaining_amount)
    {
        $this->id = $id;
        $this->category_name = $category_name;
        $this->price = $price;
        $this->total_amount = $total_amount;
        $this->remaining_amount = $remaining_amount;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'id':
                return $this->id;
            case 'category_name':
                return $this->category_name;
            case 'price':
                return $this->price;
            case 'total_amount':
                return $this->total_amount;
            case 'remaining_amount':
                return $this->remaining_amount;
        }
    }

    public function generateTicket()
    {
        // Ketika melakukan pemesanan
        // Cek ketersediaan tiket
    }
}
