<?php
class User
{
    public $username;
    public $age;
    public $phone;
    public $ip;

    public function __construct($username, $age, $phone)
    {
        $this->username = $username;
        $this->age = $age;
        $this->phone = $phone;
    }

    public function __toString()
    {
        return "<div class='user'>
                    <h2>User Information</h2>
                    <p>Username: {$this->username}</p>
                    <p>Age: {$this->age}</p>
                    <p>Phone: {$this->phone}</p>
                </div>";
    }
}