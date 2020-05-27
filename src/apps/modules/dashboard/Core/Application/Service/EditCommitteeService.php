<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\EditCommitteeRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Password;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Username;


class EditCommitteeService
{
    protected $committee_repo;

    public function __construct(ICommitteeRepository $committee_repo)
    {
        $this->committee_repo = $committee_repo;
    }

    public function execute(EditCommitteeRequest $request)
    {
        $committee = $this->committee_repo->find(new CommitteeID($request->committee_id));

        if ($request->username != null) {
            $committee->changeUsername(new Username($request->username));
        }

        if ($request->new_password != null) {
            $committee->changePassword($request->old_password, Password::createFromString($request->new_password));
        }

        return $this->committee_repo->persist($committee);
    }
}
