<?php 
function register($username, $password, $confirm_password) {
    try {
        include("db/db.php");

        if ($password !== $confirm_password) {
            return "Password do not match";
        }

        $hashedPassword = md5($password);

        $sql = "SELECT username FROM users_v2 WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return "Username already exists.";
        }

        $sql = "INSERT INTO users_v2 (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $hashedPassword]);

        if ($stmt->rowCount() > 0) {
            return "Success";
        } else {
            return "Error: Unable to register user.";
        }
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm-password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];
    $message = register($username, $password, $confirm_password);
}

include("public/html/register.html");
