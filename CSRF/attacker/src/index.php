<?php
if (isset($_COOKIE)) {
    foreach ($_COOKIE as $cookie_name => $cookie_value) {
        setcookie($cookie_name, '', time() - 3600, '/');
    }
}

echo "<a href='lab1.php'>lab1</a><br><br>";
echo "<a href='lab2.php'>lab2</a>";