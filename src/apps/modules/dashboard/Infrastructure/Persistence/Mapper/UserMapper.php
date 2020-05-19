<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Mapper;

use Its\Example\Dashboard\Core\Domain\Model\User\Password;
use Its\Example\Dashboard\Core\Domain\Model\User\User;
use Its\Example\Dashboard\Core\Domain\Model\User\UserID;
use Its\Example\Dashboard\Core\Domain\Model\User\Username;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\UserRecord;

class UserMapper
{
    public static function toUserRecord(User $user): UserRecord
    {
        $user_record = new UserRecord();
        $user_record->id = $user->id->getString();
        $user_record->username = $user->username->getString();
        $user_record->password_hash = $user->password->getHash();

        return $user_record;
    }

    public static function toModel(UserRecord $user_record): User
    {
        return new User(
            new UserID($user_record->id),
            new Username($user_record->username),
            new Password($user_record->password_hash)
        );
    }
}