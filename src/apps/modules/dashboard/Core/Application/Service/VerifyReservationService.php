<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\VerifyReservationRequest;
use Its\Example\Dashboard\Core\Domain\Interfaces\IReservationRepository;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;
use Its\Example\Dashboard\Core\Domain\Model\Reservation\ReservationID;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;

class VerifyReservationService
{
    protected $reservation_repo;
    protected $committee_repo;

    public function __construct(IReservationRepository $reservation_repo, ICommitteeRepository $committee_repo)
    {
        $this->reservation_repo = $reservation_repo;
        $this->committee_repo = $committee_repo;
    }

    public function execute(VerifyReservationRequest $request)
    {
        $request_committee = $this->committee_repo->find(new CommitteeID($request->committee_id));

        $reservation = $this->reservation_repo->find(new ReservationID($request->reservation_id));

        $reservation->setVerificationByCommittee($request_committee);

        return $this->reservation_repo->persist($reservation);
    }
}
