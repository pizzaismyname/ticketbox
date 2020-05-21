<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Committee;

class Username
{
    public $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function getString(): string
    {
        return $this->username;
    }
}