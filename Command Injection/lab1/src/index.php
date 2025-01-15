<?php
if (isset($_POST['dns'])) {
    $dns = $_POST['dns'];
    $output = shell_exec("nslookup $dns 2>/dev/null");  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNS Lookup</title>
</head>
<body>

    <div class="container">
        <p>Enter domain name:</p>
        <form method="post" action="">
            <input type="text" name="dns" placeholder="..." required>
            <input type="submit" value="Submit">
        </form>
        
        <?php if (isset($output)): ?>
            <h2>Results:</h2>
            <pre><?= htmlspecialchars($output) ?></pre>
        <?php endif; ?>
    </div>

</body>
</html>

