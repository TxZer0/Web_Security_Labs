<?php
session_start();
include('../../db/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_GET['user_id'] ? $_GET['user_id']: $_SESSION['user_id'] ;
    if (isset($user_id)) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $stmt = $pdo->prepare("INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)");
        $result = $stmt->execute(['title' => $title, 'content' => $content, 'user_id' => $user_id]);  
        if($user_id == 1){
            echo "Flag: {LAB-IDOR-003}";
        }
    }
}
?>



