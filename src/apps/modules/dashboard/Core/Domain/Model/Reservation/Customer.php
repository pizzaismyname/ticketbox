<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Reservation;

/**
 * @property-read CustomerName $name
 * @property-read CustomerEmail $email
 */

class Customer
{
    protected $name;
    protected $email;

    public function __construct(CustomerName $name, CustomerEmail $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'name':
                return $this->name;
            case 'email':
                return $this->email;
        }
    }
}
