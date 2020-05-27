<?php

namespace Its\Example\Dashboard\Core\Domain\Model\Committee;

/**
 * @property-read CommitteeID $id
 * @property-read Username $username
 * @property-read Password $password
 */

class Committee
{
    protected $id;
    protected $username;
    protected $password;

    public static function create(string $username, string $password): Committee
    {
        return new Committee(CommitteeID::generate(), new Username($username), Password::createFromString($password), 0, 0);
    }

    public function __construct(CommitteeID $id, Username $username, Password $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
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
