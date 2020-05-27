<?php

namespace Its\Example\Dashboard\Core\Domain\Interfaces;

use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;

interface ICommitteeRepository
{
    public function find(CommitteeID $committee_id): Committee;
    public function findByCommitteePass(string $username, string $password): Committee;
    public function persist(Committee $committee);
    public function delete(Committee $committee);
}
