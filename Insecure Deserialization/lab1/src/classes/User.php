<?php
class User
{
    public $username;
    public $isAdmin;

    public function __construct($username, $isAdmin = false)
    {
        $this->username = $username;
        $this->isAdmin = $isAdmin;
    }

}