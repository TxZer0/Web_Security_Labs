<?php 
if(preg_match('/^..\/$/', $_GET['file_name'])){   
    echo "Something went wrong"; 
}
else{
    $file_path = 'images/' . $_GET['file_name']; 
    if (file_exists($file_path)) {
        header('Content-Type: image/png');
        readfile($file_path);
    }
    else { 
        http_response_code(404);
    }
}

?>
