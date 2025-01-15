<?php
function loginHandler($username, $password)
{
	try {
		include("db/db.php");
		$sql = "SELECT username FROM users_v1 WHERE username='$username' AND password='$password'";
		$query = $pdo->query($sql);
		$row = $query->fetch(PDO::FETCH_ASSOC);

		if ($row === false)
			return "Wrong username or password"; 

		$username = $row["username"];
		if ($username === "admin")
			return "Flag: {LAB-SQL-003}";
		else
			return "Welcome $username";
	} catch (mysqli_sql_exception $e) {
		return $e->getMessage();
	}
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
	$username = addcslashes($_POST["username"], "'\"");
	$password = addcslashes($_POST["password"], "'\"");
	$message = loginHandler($username, $password);
}

include("public/html/login.html");

