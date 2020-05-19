<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence\Repository;

use Its\Example\Dashboard\Core\Domain\Exception\NotFoundException;
use Its\Example\Dashboard\Core\Domain\Exception\WrongPasswordException;
use Its\Example\Dashboard\Core\Domain\Interfaces\IUserRepository;
use Its\Example\Dashboard\Core\Domain\Model\User\User;
use Its\Example\Dashboard\Core\Domain\Model\User\UserID;
use Its\Example\Dashboard\Infrastructure\Persistence\Mapper\UserMapper;
use Its\Example\Dashboard\Infrastructure\Persistence\Record\UserRecord;
use Phalcon\Di\DiInterface;

class UserRepository implements IUserRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }

    public function find(UserID $user_id): User
    {
        $user_record = UserRecord::findFirst([
            'conditions' => 'id = :id:',
            'bind' => [
                'id' => $user_id->getString()
            ]
        ]);

        if ($user_record == null)
            throw new NotFoundException;

        return UserMapper::toModel($user_record);
    }

    public function findByUserPass(string $username, string $password): User
    {
        /** @var UserRecord */
        $user_record = UserRecord::findFirst([
            'conditions' => 'username = :username:',
            'bind' => [
                'username' => $username
            ]
        ]);
        if (!$user_record) throw new NotFoundException;

        $user = UserMapper::toModel($user_record);
        if (!$user->password->testAgainst($password)) throw new WrongPasswordException;
        return $user;
    }

    public function persist(User $user)
    {
        $user_record = UserMapper::toUserRecord($user);
        $user_record->save();
    }

    public function delete(User $user)
    {
        $user_record = UserMapper::toUserRecord($user);
        $user_record->delete();
    }
}