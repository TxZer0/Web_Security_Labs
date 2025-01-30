<?php
function generateHash($filename) {
    return md5("0" . $filename);
}


if (isset($_GET['filename']) && isset($_GET['h'])) {
    $filename = $_GET['filename'];
    $hash_mac = $_GET['h'];
    
    $expected_hash = generateHash(basename($filename, '.png'));

    if ($hash_mac == $expected_hash) {
        $filepath = "images/" . $filename;
        if (file_exists($filepath)) {
            $content = file_get_contents($filepath);
            echo "<img src='data:image/png;base64," . base64_encode($content) . "' />";
        } else {
            echo "File not found!";
        }
    } else {
        echo "Invalid!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type Juggling</title>
</head>
<body>
    <a href="?filename=image1.png&h=<?php echo generateHash('image1'); ?>"><? 
    if(!isset($_GET['filename']) && !isset($_GET['h'])) {
        echo "Image 1";
    }
    ?></a>
    <br>
    <a href="?filename=image2.png&h=<?php echo generateHash('image2'); ?>"><? 
    if(!isset($_GET['filename']) && !isset($_GET['h'])) {
        echo "Image 2";
    }
    ?></a>
    <br>
    <a href="?filename=e215962017.png"><? 
    if(!isset($_GET['filename']) && !isset($_GET['h'])) {
        echo "Flag";
    }
    ?></a>
</body>
</html>