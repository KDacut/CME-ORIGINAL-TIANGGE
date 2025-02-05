<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stall Owner Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 200px;
            background-color: #f4f4f4;
            padding: 15px;
            height: 100vh;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
        .content {
            padding: 20px;
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Stall Owner Menu</h2>
        <a href="register.php">Register</a>
        <a href="upload_product.php">Upload Product</a>
    </div>
    <div class="content">
        <?php
        // Include the content of the current page
        if (isset($content)) {
            include($content);
        }
        ?>
    </div>
</body>
</html>