<?php
require_once('middleware.php');
foreach (glob("classes/*.php") as $filename) {
    include($filename);
}

if (!isset($_COOKIE['user'])) {
    $user = new User('TxZer0', 19, "0123456789");
    setcookie('user', base64_encode(serialize($user)), time() + 3600, '/');
    echo $user;
} else {
    $data = unserialize(base64_decode($_COOKIE['user']));   
    echo $data;
}


    
    

