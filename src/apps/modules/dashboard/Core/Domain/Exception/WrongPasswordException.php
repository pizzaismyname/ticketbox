<?php

namespace Its\Example\Dashboard\Core\Domain\Exception;

use RuntimeException;

class WrongPasswordException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Wrong password");
    }
}
