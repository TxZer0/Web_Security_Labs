<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home.html';  
include('pages/' . $page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <button onclick="loadPage('home.html')">Home</button>
    <button onclick="loadPage('about.html')">About</button>
    <button onclick="loadPage('contact.html')">Contact</button>
    <button onclick="loadPage('post.html')">Upload file</button>


    <script>
        function loadPage(pageName) {
            window.location.href = `?page=${pageName}`;
        }
    </script>
</body>
</html>


