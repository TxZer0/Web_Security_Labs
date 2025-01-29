<?php
session_start();
function loginHandler($username, $password)
{
    try {
        include("db/db.php");
        

        $hashedPassword = md5($password);
        $sql = "SELECT username FROM users_v2 WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row === false)
            return "Wrong username or password"; 
        $username = $row["username"];
        $_SESSION["username"] = $row["username"];
        if ($username === "admin")
            return "Flag: {LAB-SQL-006}";   
        else
            header('Location: home.php');
    } catch (mysqli_sql_exception $e) {
        return $e->getMessage();
    }
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $message = loginHandler($username, $password);
}

include("public/html/login.html");
