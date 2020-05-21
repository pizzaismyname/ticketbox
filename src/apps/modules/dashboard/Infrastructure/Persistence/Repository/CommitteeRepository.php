<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Repository;

use Its\Example\Dashboard\Core\Domain\Exception\NotFoundException;
use Its\Example\Dashboard\Core\Domain\Exception\WrongPasswordException;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;
use Its\Example\Dashboard\Infrastructure\Persistence\Mapper\CommitteeMapper;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\CommitteeRecord;
use Phalcon\Di\DiInterface;

class CommitteeRepository implements ICommitteeRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }

    public function find(CommitteeID $committee_id): Committee
    {
        $committee_record = CommitteeRecord::findFirst([
            'conditions' => 'id = :id:',
            'bind' => [
                'id' => $committee_id->getString()
            ]
        ]);

        if ($committee_record == null)
            throw new NotFoundException;

        return CommitteeMapper::toModel($committee_record);
    }

    public function findByCommitteePass(string $username, string $password): Committee
    {
        /** @var CommitteeRecord */
        $committee_record = CommitteeRecord::findFirst([
            'conditions' => 'username = :username:',
            'bind' => [
                'username' => $username
            ]
        ]);
        if (!$committee_record) throw new NotFoundException;

        $committee = CommitteeMapper::toModel($committee_record);
        if (!$committee->password->testAgainst($password)) throw new WrongPasswordException;
        return $committee;
    }

    public function create(Committee $committee)
    {
        $committee_record = CommitteeMapper::toCommitteeRecord($committee);
        $committee_record->save();
    }

    public function delete(Committee $committee)
    {
        $committee_record = CommitteeMapper::toCommitteeRecord($committee);
        $committee_record->delete();
    }
}