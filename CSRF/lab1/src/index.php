<?php
session_start();
function loginHandler($username, $password)
{
	try {
		include("db/db.php");
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user &&  $user['password'] === md5($password) ) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: home.php");
            exit();
        } else {
            return "Wrong username or password";
        }
	} catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "An error occurred, please try again.".$e->getMessage();
    }
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$message = loginHandler($username, $password);
}

include("public/html/login.html");
?>
