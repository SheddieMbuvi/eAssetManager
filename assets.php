<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="styles.css">
    <title>homepage</title>
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
    <div class="#">
        <h3 class="logo">Available assets</h3>
        <div class="data-containers" id="data-container-placeholder">
			<!-- Placeholder for data containers -->
		</div>
	<script src="assets.js"></script>		
    </div>
    <script src="script.js"></script>
</body>
</html>