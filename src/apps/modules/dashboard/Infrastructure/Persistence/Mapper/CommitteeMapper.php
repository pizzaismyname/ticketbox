<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Mapper;

use Its\Example\Dashboard\Core\Domain\Model\Committee\Password;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Username;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\CommitteeRecord;

class CommitteeMapper
{
    public static function toCommitteeRecord(Committee $committee): CommitteeRecord
    {
        $committee_record = new CommitteeRecord();
        $committee_record->id = $committee->id->getString();
        $committee_record->username = $committee->username->getString();
        $committee_record->password_hash = $committee->password->getHash();

        return $committee_record;
    }

    public static function toModel(CommitteeRecord $committee_record): Committee
    {
        return new Committee(
            new CommitteeID($committee_record->id),
            new Username($committee_record->username),
            new Password($committee_record->password_hash)
        );
    }
}