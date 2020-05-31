<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\ViewCommitteeRequest;
use Its\Example\Dashboard\Core\Application\Response\CommitteeInfo;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;

class ViewCommitteeService
{
    protected $committee_repo;

    public function __construct(ICommitteeRepository $committee_repo)
    {
        $this->committee_repo = $committee_repo;
    }

    public function execute(ViewCommitteeRequest $request): CommitteeInfo
    {
        $committee = $this->committee_repo->find(new CommitteeID($request->committee_id));
        return new CommitteeInfo($committee);
    }
}
