<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $xmlFile = $_FILES['file']['tmp_name'];

    if (file_exists($xmlFile)) {
        $dom = new DOMDocument();
        $dom->load($xmlFile, LIBXML_NOENT | LIBXML_DTDLOAD); 
        $users = $dom->getElementsByTagName('user');

        echo "<h3>User List</h3>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<thead>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        
        foreach ($users as $user) {
            $name = $user->getElementsByTagName('name')[0]->nodeValue;
            $email = $user->getElementsByTagName('email')[0]->nodeValue;
            $phone = $user->getElementsByTagName('phone')[0]->nodeValue;

            echo "<tr>";
            echo "<td>" . htmlspecialchars($name) . "</td>";
            echo "<td>" . htmlspecialchars($email) . "</td>";
            echo "<td>" . htmlspecialchars($phone) . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "XML file not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2</title>
</head>
<body>
    <h1>Change data to table</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" accept=".xml">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
