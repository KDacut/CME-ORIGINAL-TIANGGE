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

<?php $content = 'register_form.php'; ?>
<?php include('layout.php'); ?>