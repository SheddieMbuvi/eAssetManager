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
    <div class="#">
        <div class="data-containers">
        <h2>Add an Asset</h2>
        <form action="addAsset.php" method="post">
            <label for="name">Serial number:</label>
            <input type="text" id="SerialNumber" name="serialnumber" required>

            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required>
			
			<label for="AssetType">Asset type:</label>
				<select id="AssetType" name="AssetType" placeholder="select asset type">
					<option value="computer">computer</option>
					<option value="laptop">laptop</option>
					<option value="Router">Router</option>
					<option value="Switch">Switch</option>
					<option value="Printer">Printer</option>
				</select>
				
			<label for="datepicker">Date of purchase:</label>
			<input type="date" id="datepicker" name="datepicker">
			
			<label for="name">Name of the user:</label>
            <input type="text" id="name" name="name" required>

            <input type="submit" value="Submit">
        </form>
		</div>
	<script src="assets.js"></script>		
    </div>
    <script src="script.js"></script>
</body>
</html>