<?php

// connect to db
	$con = mysql_connect("localhost","bryangamotea","bryangamotea26") or die("Could not connect!");

	mysql_select_db("shoesdb") or die("Could not find database!");

// Search shoes
	if(isset($_POST['shoe_name'])) {
		$searchq = $_POST['shoe_name'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
		if ($searchq == null ) {
		$output = "No results found!";
		} else {
			$query = mysql_query("SELECT * FROM shoe_table WHERE category LIKE '%$searchq%' OR shoe_name LIKE '%$searchq%' ");
			$count = mysql_num_rows($query);
			if($count == 0){
				$output = "No results found!";
			} else {
				$header = "<tr><th>Shoe I.D.</th><th>Shoe Name</th><th>Colorway</th><th>Price</th></tr>";
				
				while ($row = mysql_fetch_array($query)) {
					$id = $row['shoe_id'];
					$name = $row['shoe_name'];
					$cw = $row['shoe_cw'];
					$price = $row['shoe_price'];
 

					$output .= "<tr><td>". $id ."</td><td>" . $name . "</td><td>" . $cw . "</td><td>" . $price . "</td></tr>";
				}
			}
		}
	}
// register

	if(!empty($_POST['uName'])){
		$sql = "INSERT INTO utable (Username,Password,Email)
		VALUES
		('$_POST[uName]','$_POST[pWord]','$_POST[Email]')";
	
		if(!mysql_query($sql,$con)) {
	  		die('Error: ' . mysql_error());
	  	}
	}
// Login
	if (isset($_POST['Username'])) {
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$sql="SELECT * FROM utable WHERE Username ='$username' AND Password='$password' LIMIT 1";
		$res = mysql_query($sql);

		if(mysql_num_rows($res) == 1) {

			$success = "Login Complete!";

		} else {
			$errmsg = "Wrong Username/Password!";
		}
	}

// Add to cart

	if (isset($_POST['shoe_id'])) {
		$shoe_cart_id = $_POST['shoe_id'];
		$query = "INSERT INTO shoe_in_cart ('"
	}
	
	mysql_close($con)

?>

<html>
	<head>
		<title>Nike</title>
		<link rel="stylesheet" href="stylesheets/main.css">
		<link rel="shortcut icon" type="image/x-icon" href="images/nikeIcon.jpg">
		<script src="scripts/jquery.js"></script>
		<script src="scripts/bootstrap.js"></script>
		<script src="scripts/main.js"></script>
		<script src="scripts/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
	</head>
	<body>
		<div id="header">
			<img id="nikeLogo" src="images/NikeLogo.png">
			<span id="JustDoIt">Just Do It.</span>
		</div>

		<div class="container">

			<form id = "search" name = "search" action="home.php" method = "post">
				<label for="s_search">Search:</label>
				<input type="text" name = "shoe_name" id = "s_search"><input type="submit" value="SUBMIT">
			</form>

			<span id="LoginButton">Log in</span>
			<span id="RegisterButton">Register</span>
			<span id="cartButton">Add To Cart</span>

				<form id="Login" name="Login" action="home.php" method="post">
					<label for="Login">Log in</label>
					<br>
					<br>
					Username:<input type="text" name="Username" size="19" maxlength="10" required>
					<br>
					<br>
					Password:<input type="password" name="Password" maxlength="6" required>
					<br>
					<br>
					<input type="submit" value="Login">
					<?php
						print($errmsg);
						print($success);
					?>
				</form>

				<form id="Register" name="Register" action="home.php" method="post">
					<label for="Register">Register</label>
					<br>
					<br>
					Username:<input type="text" name="uName" size="19" maxlength="10" required>
					<br>
					Password:<input type="password" name="pWord" maxlength="6" required>
					<br>
					Email:<input type="text" name="Email" required>
					<br>
					<br>
					<input type="submit" value="Register">
				</form>

				<form id = "cart" action="addCart.php" method = "post">
					<label for="shoe_id">Shoe ID:</label>
					<input type="text" size = "19" name = "shoe_id">
					<input type="submit" value = "Add to Cart">
				</form>

			<div class="content">
				<h1>Choose your game:</h1>
				<form id = "brand_logo" action="home.php" method = "post">
					<input type="button" name = "kobe" id = "kobe">
					<input type="button" name = "lebron" id = "lebron">
					<input type="button" name = "kd" id = "kd">
				</form>
			</div>

			<div class="content_two">
				<table>
					<?php 
					print($header);
					print($output); 
					?>

				</table>
			</div>
		</div>
	</body>
</html>