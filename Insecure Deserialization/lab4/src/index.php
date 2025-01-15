<?php
require_once('middleware.php');
foreach (glob("classes/*.php") as $filename) {
    include($filename);
}

if (!isset($_COOKIE['user'])) {
    $user = new User('guest');
    setcookie('user', base64_encode(serialize($user)), time() + 3600, '/');
    $_SESSION['user'] = $user;
} else {
    $data = unserialize(base64_decode($_COOKIE['user']));      
    $_SESSION['user'] = $data;
}

if(isset($_SESSION['user'])){
    try {
        $_SESSION['user']->run();
    } catch (\Throwable $th) {
        echo "Something went wrong";
    }
}
    
    

