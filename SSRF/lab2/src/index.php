<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_url = $_POST['image_url'];
    $pattern = '/^file/';      
    if(preg_match($pattern, $image_url))
        die("Something went wrong!");
    $image_data = @file_get_contents($image_url);
    $image_base64 = base64_encode($image_data);
    $image_mime = "data:image/png;"; 

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview</title>
</head>
<body>
    <h1>Preview image from URL</h1>
    <form action="" method="POST">
        <input type="text" name="image_url" placeholder="Enter image URL" required>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($image_base64)): ?>
        <h1>Result:</h1>
        <img src="data:<?= $image_mime ?>;base64,<?= $image_base64 ?>" alt="Image">
    <?php endif; ?>
</body>
</html>
