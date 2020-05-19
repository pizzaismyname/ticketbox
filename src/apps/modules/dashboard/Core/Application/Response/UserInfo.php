<?php

namespace Its\Example\Dashboard\Core\Application\Response;

use Its\Example\Dashboard\Core\Domain\Model\User\User;

class UserInfo
{
    public $id;
    public $username;

    public function __construct(User $user)
    {
        $this->id = $user->id->getString();
        $this->username = $user->username->getString();
    }
}