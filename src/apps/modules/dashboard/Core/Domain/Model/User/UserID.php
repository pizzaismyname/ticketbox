<?php

namespace Its\Example\Dashboard\Core\Domain\Model\User;

use Its\Example\Dashboard\Core\Domain\Exception\UuidAssertionError;
use Ramsey\Uuid\Uuid;

class UserID
{
    protected $guid;

    public static function generate(): UserId
    {
        return new UserID(Uuid::uuid4()->toString());
    }

    public function __construct(string $guid)
    {
        assert(strlen($guid) == 36, new UuidAssertionError);
        $this->guid = $guid;
    }

    public function getString(): string
    {
        return $this->guid;
    }
}