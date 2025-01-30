<?php
function loginHandler($username, $password)
{
	try {
		include("db/db.php");
        $sql = "SELECT username, password FROM users_v1 WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row == false)
            return json_encode(["message" => "Wrong username or password"]);

        if ($row['password'] != $password)
            return json_encode(["message" => "Wrong username or password"]);

        if($row['username'] == 'admin')
            return json_encode(["message" => "Flag: {LAB-Type_Juggling-001}"]);
        else
            return json_encode(["message" => "Welcome $username"]);
	} catch (PDOException $e) {
		return json_encode(["message" => "Error: " . $e->getMessage()]);
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data['username']) && isset($data['password'])) {
        $username = $data['username'];  
        $password = $data['password'];  
        $response = loginHandler($username, $password);
    }
}
if(!isset($response))
    $response = ["message" => "Invalid request"];
echo $response;
exit;


