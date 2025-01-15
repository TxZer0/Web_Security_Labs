<?php
    if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
        http_response_code(403);
        die("Unauthorized!");
    }
  $ip = $_GET['ip']; 
  $output = shell_exec("ping -c 4 $ip"); 
  echo "<pre>$output</pre>";
?>