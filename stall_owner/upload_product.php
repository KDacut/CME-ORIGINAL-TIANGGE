<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "stalls_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    // Handle image upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert product into the database
    $sql = "INSERT INTO products (owner_id, name, description, quantity, category, price, image) VALUES (1, '$name', '$description', $quantity, '$category', $price, '$target_file')"; // Replace '1' with the actual owner ID

    if ($conn->query($sql) === TRUE) {
        echo "New product uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Product</title>
</head>
<body>
    <h2>Upload Product</h2>
    <form method="post" action="" enctype="multipart/form-data">
        Product Name: <input type="text" name="name" required><br>
        Description: <textarea name="description" required></textarea><br>
        Quantity: <input type="number" name="quantity"