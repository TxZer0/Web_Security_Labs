<?php
session_start();
$_SESSION['user_id'] = 2;
header("Location: list.php?user_id=2");
exit();
?>
