<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Record;

use Phalcon\Mvc\Model;

class CommitteeRecord extends Model
{
    public $id;
    public $username;
    public $password_hash;

    public function initialize()
    {
        $this->setConnectionService('db');
        $this->setSource('committees');
    }
}
