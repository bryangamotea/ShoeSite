<?php
	$con = mysql_connect("localhost","root","boinx1234825") or die("Could not connect!");

	mysql_select_db("shoesdatabase") or die("Could not find database!");


	if(isset($_POST['shoe_name'])) {
		$searchq = $_POST['shoe_name'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

		$query = mysql_query("SELECT * FROM shoe_table WHERE category LIKE '%$searchq%' OR shoe_name LIKE '%$searchq%' " );
		$count = mysql_num_rows($query);

		if ($count == 0 OR $searchq = " ") {
			$output = "No results found!";
		} else {
			$header = "<th>Shoe Name</th><th>Colorway</th><th>Price</th>";
			while ($row = mysql_fetch_array($query)) {
				$name = $row['shoe_name'];
				$cw = $row['shoe_cw'];
				$price = $row['shoe_price'];


				$output .= "<tr><td>" . $name . "</td>" . "<td>" . $cw . "</td>" . "<td>" . $price . "</td></tr>";
			}
		}
	}
?>
<html>
	<head>
		<title>Nike</title>
		<link rel="stylesheet" href="stylesheets/main.css">
		<link rel="shortcut icon" type="image/x-icon" href="images/NikeLogo2.png">
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

			<form id = "search"name = "search" action="home.php" method = "post">
				<label for="s_search">Search:</label>
				<input type="text" name = "shoe_name" id = "s_search"><input type="submit" value="SUBMIT">
			</form>

			<div class="content">
				<h1>Choose your game:</h1>
				<form id = "brand_logo" action="home.php" method = "post">
					<input type="image" src="images/KobeLogo.JPG" name = "kobe">
					<input type="image" src="images/lebronlogo2.jpg" name = "lebron">
					<input type="image" src="images/KDLogo.jpg" name = "kd">
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