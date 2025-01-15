<?php
function loginHandler($username, $password)
{
	try {
		include("db/db.php");
		$sql = "SELECT username, password FROM users_v2 WHERE username='$username'";
		$query = $pdo->query($sql);
		$row = $query->fetch(PDO::FETCH_ASSOC); 

		if ($row === false)
			return "Wrong username or password"; 

        if ($row["password"] !== md5($password))
			return "Wrong username or password";

		$username = $row["username"];
		if ($username === "admin")
			return "Flag: {LAB-SQL-005}";
		else
			return "Welcome $username";
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

