<?php
session_start();
function changePassword($current_password, $new_password, $confirm_password) {
    try {
        include("db/db.php");
        $username = $_SESSION['username'];
        echo "username: ".$username;
    
        if ($new_password !== $confirm_password) {
            return "New passwords do not match.";
        }
        $checkPasswordQuery = "SELECT password FROM users_v2 WHERE username = ?";
        $stmt = $pdo->prepare($checkPasswordQuery);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row || $row['password'] !== md5($current_password)) {
            return "Current password is incorrect.";
        }
        
        $updatePasswordQuery = "UPDATE users_v2 SET password = MD5('$new_password') WHERE username = '$username'";
        $pdo->exec($updatePasswordQuery);  
        return "Password changed successfully.";
    } catch (mysqli_sql_exception $e) {
            return $e->getMessage();
    }

    
    
}


if (isset($_POST['current_password']) && $_POST['new_password'] && $_POST['confirm_password']) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $message = changePassword($current_password, $new_password, $confirm_password);
}

include("public/html/change_password.html");