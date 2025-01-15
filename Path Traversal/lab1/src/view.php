<?php 
$file_name = $_GET['file_name'];
$file_path = 'images/' . $file_name;  
if (file_exists($file_path)) {
    header('Content-Type: image/png');
    readfile($file_path);
}
else { 
    http_response_code(404);
}
