<?php
class Router
{
    public $host;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function run()
    {
        return shell_exec("ping " . $this->host);
    }
}