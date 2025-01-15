<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"])) {
        $file = $_FILES["file"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileDestination = "upload/" . $fileName;

        $whitelist = array("image/jpeg", "image/png", "image/gif");

        $mimeType = mime_content_type($fileTmpName);
        if (!in_array($mimeType, $whitelist)) {
            die("Something went wrong");
        }

        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "There was an error uploading your file!";
    } 
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Choose file to upload:</label>
        <input type="file" name="file" id="file" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
