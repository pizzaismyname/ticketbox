<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Committee;

use Ramsey\Uuid\Uuid;

class CommitteeID
{
    protected $guid;

    public static function generate(): CommitteeId
    {
        return new CommitteeID(Uuid::uuid4()->toString());
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