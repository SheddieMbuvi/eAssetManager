<?php
$host = 'localhost'; // The database server hostname (usually 'localhost' for local development)
$username = 'root'; // Your database username
$password = ''; // database password
$database = 'amt_database'; // Your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform server-side processing (e.g., database insertion, validation, etc.)
    // You would typically add your server-side logic here.

    // Example: Display a success message
	
	$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful";
    } else {
        // Registration failed
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

$conn->close();
	
    echo "<p>Registration successful! Welcome, $name!</p>";
	header("refresh:2;url=index.php");
	
}
else {
    // Redirect to the form if accessed directly
    header("Location: index.html");
    exit;
}
?>