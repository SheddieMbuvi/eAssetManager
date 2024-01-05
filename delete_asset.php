<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'amt_database';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the asset ID from the request
$assetId = $_GET['id'];

// Prepare and bind the delete operation
$stmt = $conn->prepare("DELETE FROM assets WHERE serialnumber = ?");
$stmt->bind_param("s", $assetId);

if ($stmt->execute()) {
    // Return success status
    http_response_code(200);
    echo "Asset deleted successfully";
} else {
    // Return error status
    http_response_code(500);
    echo "Error deleting asset: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>