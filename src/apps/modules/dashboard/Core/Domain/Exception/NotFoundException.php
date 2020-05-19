<?php

namespace Its\Example\Dashboard\Core\Domain\Exception;

class NotFoundException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct();
    }
}