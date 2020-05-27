<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\CreateCommitteeRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;

class CreateCommitteeService
{
    protected $committee_repo;

    public function __construct(ICommitteeRepository $committee_repo)
    {
        $this->committee_repo = $committee_repo;
    }

    public function execute(CreateCommitteeRequest $request)
    {
        $committee = Committee::create($request->username, $request->password);

        return $this->committee_repo->persist($committee);
    }
}