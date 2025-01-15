<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"])) {
        $file = $_FILES["file"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];

        $ext = end(explode('.', $fileName));
        if($ext != 'txt'){
            die("Just received a text file!");
        }

        $uploadDir = "/var/www/html/upload/";
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }
        
        $fileDestination = $uploadDir. $fileName;
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "There was an error uploading your file!";
    } 
    echo "<a href='/upload/$fileName'>File uploaded!</a>";
}
?>
