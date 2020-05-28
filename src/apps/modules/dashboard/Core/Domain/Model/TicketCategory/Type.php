<?php

namespace Its\Example\Dashboard\Core\Domain\Model\TicketCategory;

class Type
{
    protected $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getString(): string
    {
        return $this->type;
    }
}
