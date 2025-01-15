<?php
try {
    include("db/db.php");
    $sql = "SELECT id, title FROM posts";
    $query = $pdo->query($sql);
} catch (mysqli_sql_exception $e) {
    return $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post list</title>
</head>
<body>
    <h1>Post list</h1>
    <ul>
        <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
                <a href="post.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                    <?php echo htmlspecialchars($row['title']); ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
