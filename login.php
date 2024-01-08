<?php
$host = 'localhost'; // The database server hostname
$username = 'root'; // The database username
$password = ''; // database password
$database = 'amt_database'; // Database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"]; // Corrected from "name" to "email"
    $password = $_POST["password"];

    // Validate and sanitize user input if needed

    // Query the database to check for the email and password
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Successful login
        session_start();
        $_SESSION["email"] = $email; // Store email in a session variable
        header("Location: home.php"); // Redirect to the home page
        exit();
    } else {
        // Invalid login
        echo "Invalid email or password.";
		header("refresh:2;url=index.php"); // Redirect to the index for another trial
    }

    $stmt->close();
}

$conn->close();
?>