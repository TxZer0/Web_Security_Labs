<?php
class Server 
{
    public $router;
    public function __construct($router)
    {
        $this->router = $router;
    }

    public function __toString()
    {
        return $this->router->getInfo();
    }
}