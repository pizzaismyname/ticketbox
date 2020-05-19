<?php

namespace Its\Example\Dashboard\Core\Application\Service;

use Its\Example\Dashboard\Core\Application\Request\LoginRequest;
use Its\Example\Dashboard\Core\Application\Response\UserInfo;
use Its\Example\Dashboard\Core\Domain\Interfaces\IUserRepository;

class LoginService
{
    protected $user_repo;

    public function __construct(IUserRepository $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    public function execute(LoginRequest $request): UserInfo
    {
        $user = $this->user_repo->findByUserPass($request->username, $request->password);
        return new UserInfo($user);
    }
}