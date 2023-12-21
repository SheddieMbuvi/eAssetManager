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
    $serialnumber = $_POST["serialnumber"];
    $model = $_POST["model"];
    $AssetType = $_POST["AssetType"];
	$datepicker = $_POST["datepicker"];
	$name = $_POST["name"];

    // Perform server-side processing (e.g., database insertion, validation, etc.)
    // You would typically add your server-side logic here.

    // Example: Display a success message
	
	$sql = "INSERT INTO assets (serialnumber, model, AssetType, PurchaseDate, AssignedUser) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $serialnumber, $model, $AssetType, $datepicker, $name);

    if ($stmt->execute()) {
        // Asset Registration successful
        echo "Asset added successfuly";
    } else {
        // Registration failed
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

$conn->close();
	header("refresh:2;url=home.php");
	
}
else {
    // Redirect to the form if accessed directly
    header("Location: home.php");
    exit;
}
?>