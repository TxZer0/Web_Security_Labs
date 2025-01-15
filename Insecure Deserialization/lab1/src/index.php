<?php
require_once('middleware.php');
foreach (glob("classes/*.php") as $filename) {
    include($filename);
}

if (!isset($_COOKIE['user'])) {
    $user = new User('guest', false);
    setcookie('user', base64_encode(serialize($user)), time() + 3600, '/');
    echo "<h1>Hello guest</h1>";
} else {
    $data = unserialize(base64_decode($_COOKIE['user']));
    if ($data->username === "admin" && $data->isAdmin) {
        echo "Flag: {LAB-DESERIALIZE-001}";
    }
    elseif($data->username === "guest"){
        echo "<h1>Hello guest</h1>";
    }
    else{
        echo "<h1>Who are you?</h1>";
    }
}

