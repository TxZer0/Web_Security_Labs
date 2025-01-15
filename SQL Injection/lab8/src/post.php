<?php
function postHandler($id)
{
    try {
        include("db/db.php");   
        $sql = "SELECT title, content FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row === false) {
            echo "Post not found.";
        } else {
            $title = htmlspecialchars($row["title"]);
            $content = htmlspecialchars($row["content"]);
            echo "<h1>$title</h1><p>$content</p>";
        }
    } catch (mysqli_sql_exception $e) {
        return "Database error: " . $e->getMessage();
    }
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $message = postHandler($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
</head>
<body>
    <a href="/">Search post</a><br>
    <div id="post">
        <?php if(isset($message)) echo $message; ?>
    </div>
</body>
</html>