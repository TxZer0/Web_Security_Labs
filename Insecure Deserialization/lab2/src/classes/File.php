<?php
class Logger {
    public $filepath;

    public function __construct($filepath)
    {
        $this->filepath = $filepath; 
    }

    public function __destruct()
    {
        system("rm -f " . $this->filepath);
    }
}