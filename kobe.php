<?php
	include 'con.php';

	$shoeQuery = mysql_query("SELECT * FROM shoe_table WHERE category LIKE '{$_GET["category"]}'");
	$shoeCount = mysql_num_rows($shoeQuery);
	if($shoeCount == 0){
		$shoeRes = "No results found!";
	} else {
		while ($row = mysql_fetch_array($shoeQuery)){
			$shoeId = $row['shoe_id'];
			$shoeName = $row['shoe_name'];
			$shoeCw = $row['shoe_cw'];
			$shoePrice = $row['shoe_price'];
			$shoePic = $row['shoe_pic'];

			$shoeRes .= "<td>" . "<img src='$shoePic'>" . "<br><br>" . $shoeName . "<br><br>" . $shoeCw . "<br><br>" . $shoePrice . "</td>";

		}
	}


?>

<div class="col-lg-4">
	<img id="shoeMamba" src="images/KobeLogo.png">
	<img id="shoeMamba2" src="images/Kobe4.png">
	<img id="shoeMamba3" src="images/Kobe2.png">
	<img id="shoeMamba5" src="images/mambamamba.png">
	<h1>
		<?php
		print($_GET['category']);
		?>
	</h1>
	<table id="shoesTable">
		<tr>
		<?php
		print($shoeRes);
		?>
		</tr>
	</table>


</div>