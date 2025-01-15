<?php
require_once('middleware.php');
foreach (glob("classes/*.php") as $filename) {
    include($filename);
}

if (!isset($_COOKIE['user'])) {
    $user = new User('guest');
    setcookie('user', base64_encode(serialize($user)), time() + 3600, '/');
    echo "<h1>Hello guest</h1>";
} else {
    $data = unserialize(base64_decode($_COOKIE['user'])); 
    echo "<h1>Hello $data->username</h1>";  
}