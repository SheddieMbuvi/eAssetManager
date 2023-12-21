<?php
// fetch_data.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "amt_database";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM assets";
$result = mysqli_query($conn, $sql);

$data = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

mysqli_close($conn);

header("Content-Type: application/json");
echo json_encode($data);
?>