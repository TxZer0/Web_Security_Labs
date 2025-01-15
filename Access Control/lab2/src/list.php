<?php
session_start();
include('db/db.php');

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $_GET['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <p>Create a new post: <a href="post.php">New</a></p>
    <h1>List of posts</h1>
    <ol>
        <?php foreach ($posts as $post): ?>
            <li>
                <h2>
                    Title: <?= htmlspecialchars($post['title']) ?>
                </h2>
                <p>
                    Content: <?= htmlspecialchars($post['content']) ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ol>
</body>
</html>
