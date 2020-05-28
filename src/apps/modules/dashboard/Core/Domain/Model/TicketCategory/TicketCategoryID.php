<?php

namespace Its\Example\Dashboard\Core\Domain\Model\TicketCategory;

use Ramsey\Uuid\Uuid;

class TicketCategoryID
{
    protected $guid;

    public static function generate(): TicketCategoryId
    {
        return new TicketCategoryID(Uuid::uuid4()->toString());
    }

    public function __construct(string $guid)
    {
        $this->guid = $guid;
    }

    public function getString(): string
    {
        return $this->guid;
    }
}