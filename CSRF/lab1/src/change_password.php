<?php
session_start();

function changePassword($new_password, $confirm_password) {
    try {
        include("db/db.php"); 
        $username = $_SESSION['username'];
        if (!$username) {
            return "User not logged in.";
        }
    
        if ($new_password !== $confirm_password) {
            return "New passwords do not match.";
        }

        $checkPasswordQuery = "SELECT password FROM users WHERE username = :username";
        $stmt = $pdo->prepare($checkPasswordQuery);
        $stmt->execute([':username' => $username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $updatePasswordQuery = "UPDATE users SET password = :password WHERE username = :username";
        $stmt = $pdo->prepare($updatePasswordQuery);
        $hashed_password = md5($new_password);
        $stmt->execute([':password' => $hashed_password, ':username' => $username]);
        return "Password changed successfully.";

    }   catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return "An error occurred, please try again.".$e->getMessage();
    }
}

if (isset($_POST['new_password'], $_POST['confirm_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $message = changePassword($new_password, $confirm_password);
}

include("public/html/change_password.html");
?>
