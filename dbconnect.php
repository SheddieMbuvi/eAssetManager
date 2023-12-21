<?php
$host = 'localhost'; // The database server hostname (usually 'localhost' for local development)
$username = 'root'; // database username
$password = ''; // database password
$database = 'amt_database'; // database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}