<?php

namespace Its\Example\Dashboard\Core\Domain\Model\User;

/**
 * @property-read UserID $id
 * @property-read Username $username
 * @property-read Password $password
 */

class User
{
    protected $id;
    protected $username;
    protected $password;

    public static function create(string $username, string $password): User
    {
        return new User(UserID::generate(), new Username($username), Password::createFromString($password), 0, 0);
    }

    public function __construct(UserID $id, Username $username, Password $password, int $following_count, int $follower_count)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->following_count = $following_count;
        $this->follower_count = $follower_count;

        $this->following = new WatchableList(UserID::class);
    }

    public function __get($name)
    {
        switch ($name) {
            case 'id':
                return $this->id;
            case 'username':
                return $this->username;
            case 'password':
                return $this->password;
        }
    }

    public function changeUsername(Username $username)
    {
        $this->username = $username;
    }

    public function changePassword(string $old_password, Password $new_password)
    {
        assert($this->password->testAgainst($old_password), new WrongPasswordException);
        
        $this->password = $new_password;
    }
}