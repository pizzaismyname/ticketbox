<?php

namespace Its\Example\Dashboard\Core\Application\Response;

use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;

class CommitteeInfo
{
    public $id;
    public $username;

    public function __construct(Committee $committee)
    {
        $this->id = $committee->id->getString();
        $this->username = $committee->username->getString();
    }
}