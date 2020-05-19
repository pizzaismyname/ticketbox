<?php

namespace Its\Example\Dashboard\Core\Domain\Interfaces;

use Its\Example\Dashboard\Core\Domain\Model\User\User;
use Its\Example\Dashboard\Core\Domain\Model\User\UserID;

interface IUserRepository
{
    public function find(UserID $user_id): User;
    public function findByUserPass(string $username, string $password): User;
    public function persist(User $user);
    public function delete(User $user);
}
