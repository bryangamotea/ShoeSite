<?php
	$con = mysql_connect("localhost","root","boinx1234825") or die("Could not connect!");
	mysql_select_db("shoesdatabase") or die("Could not find database!");

			
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

<div id="shoeContent">
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