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
    $owner_name = $_POST['owner_name'];
    $owner_email = $_POST['owner_email'];
    $owner_password = password_hash($_POST['owner_password'], PASSWORD_DEFAULT); // Hash the password

    // Insert owner into the database
    $sql = "INSERT INTO owners (name, email, password) VALUES ('$owner_name', '$owner_email', '$owner_password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register as Stall Owner</h2>
    <form method="post" action="">
        Name: <input type="text" name="owner_name" required><br>
        Email: <input type="email" name="owner_email" required><br>
        Password: <input type="password" name="owner_password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>