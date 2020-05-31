<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Response\CommitteeInfo;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;

class ListCommitteeService
{
    protected $committee_repo;

    public function __construct(ICommitteeRepository $committee_repo)
    {
        $this->committee_repo = $committee_repo;
    }

    /** @return CommitteeInfo[] */
    public function execute(): array
    {
        $committees = [];
        foreach ($this->committee_repo->all() as $committee) {
            $committee_info = new CommitteeInfo($committee);
            $committees[] = $committee_info;
        }
        return $committees;
    }
}
