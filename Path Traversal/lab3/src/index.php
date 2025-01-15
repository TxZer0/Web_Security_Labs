<?php
$dir = "images";
$images = glob($dir . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE); 

if ($images) {
    echo "<h1>List of Images:</h1><ul>";
    foreach ($images as $image) {
        $imagePath = basename($image); 
        echo "<li><a href='view.php?file_name=" . urlencode($imagePath) . "'><img src='$dir/$imagePath' alt='$imagePath' style='width:100px; height:auto;'></a></li>";
    }
    echo "</ul>";
} else {
    echo "No images found in the directory!";
}
?>
