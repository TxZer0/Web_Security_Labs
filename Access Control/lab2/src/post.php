<?php
session_start();
include('db/db.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_GET['user_id'] ? $_GET['user_id']: $_SESSION['user_id'] ;
    if (isset($user_id)) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $stmt = $pdo->prepare("INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)");
        $result = $stmt->execute(['title' => $title, 'content' => $content, 'user_id' => $user_id]);  
        if($user_id == 1){
            echo "Flag: {LAB-IDOR-002}";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
<h1>Create a new post</h1>
    <form action="post.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>
        <label for="content">Content:</label><br>
        <textarea name="content" id="content" required></textarea><br>
        <button type="submit">Post</button>
    </form>
    <?php
        if ($result) {
            echo "<p style='color: green;'>Post created successfully!</p>";
        }
    ?>
    <p>Comeback:<a href="index.php">List</a></p>
</body>
</html>
