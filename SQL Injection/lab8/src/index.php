<?php
function searchPost($search){
    try {
        include("db/db.php");
        $sql = "SELECT id, title, content FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
		$query = $pdo->query($sql);

        if ($query->rowCount() > 0) {
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $title = htmlspecialchars($row['title']);
                $content = htmlspecialchars($row['content']);
                echo "<h2><a href='post.php?id={$row['id']}'>$title</a></h2>";
                echo "<p>$content</p>";
            }
        } else {
            echo "No posts found matching your search.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Database error: " . $e->getMessage();
    }
}

if(isset($_GET['search'])){
    $search = $_GET['search'];
    searchPost($search);
}

include("public/html/search.html")
?>
