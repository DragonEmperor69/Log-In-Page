<?php
// Database configuration
$servername = "LAPTOP-MNDF2NH5\SQLEXPRESS"; // or 127.0.0.1
$username = "";        // MySQL username (default: 'root')
$password = "";            // MySQL password (default: '')
$dbname = "user_data";      // Your database name

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Hash the password for security (optional, but recommended)
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Prepare the SQL query
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$hashed_password')";

    // Execute the query and check if successful
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
