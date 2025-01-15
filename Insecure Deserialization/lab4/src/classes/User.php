<?php
class User
{
    public $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public function run()
    {
        header("Location: ../html/playround.html");
        exit();
    }

}