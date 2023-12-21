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

// Array to store the count for each asset type
$assetTypeCounts = array();

// Asset types list
$assetTypes = array('computer', 'laptop', 'printer', 'switch', 'router');

// Loop through each asset type
foreach ($assetTypes as $assetType) {
    // SQL query to get the count for each asset type
    $sql = "SELECT COUNT(*) AS count FROM assets WHERE AssetType = '$assetType'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
        $assetTypeCounts[$assetType] = $count;
    } else {
        // Handle the error as needed
        $assetTypeCounts[$assetType] = 0; // Set count to 0 in case of an error
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="styles.css">
    <title>Homepage</title>
</head>
<body>
    <header>
        <h2 class="logo">e-Asset Manager</h2>
        <nav class="navigation">
            <a href="home.php">Home</a>
            <a href="#">About</a>
            <a href="logout.php"><button class="btnLogin-popup">Logout</button></a>
        </nav>    
    </header>
   
    <div class="container" id="container">
        <div class="assets-container">
            <h1 class="list">Number of Available assets</h1>
            <ul class="list">
                <li><span><ion-icon name="desktop-sharp"></ion-icon>&nbsp;&nbsp;&nbsp;Computers</span> - <?php echo $assetTypeCounts['computer']; ?></li>
                <li><span><ion-icon name="laptop-outline"></ion-icon>&nbsp;&nbsp;&nbsp;Laptops</span> - <?php echo $assetTypeCounts['laptop']; ?></li>
                <li><span><ion-icon name="print-outline"></ion-icon>&nbsp;&nbsp;&nbsp;Printers</span> - <?php echo $assetTypeCounts['printer']; ?></li>
                <li><span><ion-icon name="move"></ion-icon>&nbsp;&nbsp;&nbsp;Switches</span> - <?php echo $assetTypeCounts['switch']; ?></li>
                <li><span><ion-icon name="globe"></ion-icon>&nbsp;&nbsp;&nbsp;Routers</span> - <?php echo $assetTypeCounts['router']; ?></li>
            </ul>
            <p>Click <a href="assets.php">Here</a> to see all Assets</p>
            <br>
            <a href="assetadd.php"><span><ion-icon name="add-sharp"></ion-icon></span> Asset </a>
        </div>
    </div>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>