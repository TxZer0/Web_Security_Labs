<?php
session_start(); 
session_unset(); 
session_destroy(); 

if (isset($_COOKIE)) {
    foreach ($_COOKIE as $cookie_name => $cookie_value) {
        setcookie($cookie_name, '', time() - 3600, '/');
    }
}

header("Location: index.php");
exit();
?>
