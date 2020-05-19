<?php

namespace Its\Example\Dashboard\Core\Domain\Model\User;

use Its\Example\Dashboard\Core\Domain\Exception\UsernameAssertionError;

class Username
{
    public $username;

    public function __construct(string $username)
    {
        assert((strlen($username) <= 15 && ctype_alnum($username)), new UsernameAssertionError);

        $this->username = $username;
    }

    public function getString(): string
    {
        return $this->username;
    }
}