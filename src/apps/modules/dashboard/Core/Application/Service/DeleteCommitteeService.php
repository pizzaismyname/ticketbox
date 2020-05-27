<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\DeleteCommitteeRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;

class DeleteCommitteeService
{
    protected $committee_repo;

    public function __construct(ICommitteeRepository $committee_repo)
    {
        $this->committee_repo = $committee_repo;
    }

    public function execute(DeleteCommitteeRequest $request)
    {
        $committee = $this->committee_repo->find(new CommitteeID($request->committee_id));
        $this->committee_repo->delete($committee);
    }
}