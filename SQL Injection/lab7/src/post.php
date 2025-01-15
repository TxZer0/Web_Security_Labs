<?php
function postHandler($id)
{
    try {
        include("db/db.php");
        $sql = "SELECT title, content FROM posts WHERE id=$id";
        $query = $pdo->query($sql);
        $row = $query->fetch(PDO::FETCH_ASSOC); 

        if ($row === false) {
            return "Post not found."; 
        }
        $title = htmlspecialchars($row["title"]);
        $content = htmlspecialchars($row["content"]);
        return "<h1>$title</h1><p>$content</p>";
    } catch (mysqli_sql_exception $e) {
        return "Database error: " . $e->getMessage();
    }
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $message = postHandler($id);
} else {
    $message = "Invalid request. No post ID provided.";
}

include("public/html/post.html");
?>
