<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\LoginRequest;
use Its\Example\Dashboard\Core\Application\Response\CommitteeInfo;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;

class LoginService
{
    protected $committee_repo;

    public function __construct(ICommitteeRepository $committee_repo)
    {
        $this->committee_repo = $committee_repo;
    }

    public function execute(LoginRequest $request): CommitteeInfo
    {
        $committee = $this->committee_repo->findByCommitteePass($request->username, $request->password);
        return new CommitteeInfo($committee);
    }
}