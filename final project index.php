<!DOCTYPE html>
<html>
<head>
	<title>Farmer John's awesome database</title>
	<style tpye="text/css">
		#header
		{
			border: 10px solid black;
			margin: 25px auto;
			width: 1000px;
		}
		#body
		{
			//border: 3px solid black;
			margin: 25px auto;
			width: 1000px;
			white-space: nowrap;
		}
	</style>
</head>
<body>
	<div id="header" align="center" style="color:black">
		<h1>Farmer John's database</h1>
	</div>
	<div id="body">
	<h2 align="center">List of Crops</h2>
<?php 


	//******Variables************************************************
	$servername="ucdencsesql05.ucdenver.pvt";
	$username="student12";
	$password="********";
	$dbname="student12db";


	$conn = new mysqli($servername,$username,$password,$dbname);

	//Fruit query
	$fruitOne = $conn->query("SELECT * FROM FRUIT1");
	$fruitTwo = $conn->query("SELECT crop_num,yield_of_bushels,dollar_per_bushels FROM FRUIT2");

	//customer order query
	$customOrder1 = $conn->query("");


	//**************************************************************


	//******Error checking******************************************
	//checks if connected or not
	if($conn->connect_error)
	{
		die("Connection failed: <br>" . $conn->connect_error);
	}

	else
	{

	}
	//*************************************************************

	if($fruitOne->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>plant name</b></td>
			<td align='left'><b>color</b></td>
			<td align='left'><b>crop number</b></td>
			<td align='left'><b>location</b></td>
			<td align='left'><b>plant type</b></td>
			<td align='left'><b>insecticides</b></td>
			<td align='left'><b>year planted</b></td>
			<td align='left'><b>number of plants planted</b></td>
			<td align='left'><b>season done</b></td>
			<td align='left'><b>organic</b></td></tr>";

			while($rows = $fruitOne->fetch_assoc())
			{
				echo "<tr><td align='left'>$rows[plant_name]</td>
					<td align='left'>$rows[color]</td>
					<td align='left'>$rows[crop_num]</td>
					<td align='left'>$rows[location]</td>
					<td align='left'>$rows[plant_type]</td>
					<td align='left'>$rows[insecticides]</td>
					<td align='left'>$rows[year_planted]</td>
					<td align='left'>$rows[num_plants_planted]</td>
					<td align='left'>$rows[season_done]</td>
					<td align='left'>$rows[organic]</td></tr>";
			}
			echo "</table>";
	}
	else
	{
		echo "No Results.<br>";
	}

	echo "<br><br><br>";

	if($fruitTwo->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>Crop number</b></td>
			<td align='left'><b>yield of bushels</b></td>
			<td align='left'><b>dollar(s) per bushels</b></td></tr>";

		while($row = $fruitTwo->fetch_assoc())
		{
			echo "<tr><td align='left'>$row[crop_num]</td>
				<td align='left'>$row[yield_of_bushels]</td>
				<td align='left'>$row[dollar_per_bushels]</td></tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "No Results.<br>";
	}
	echo "<br><br><br>";
	
	
 ?>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
	<div id="body">
	<h2 align="center">Customers' summarry order</h2>
<?php 


	//******Variables************************************************
	$servername="ucdencsesql05.ucdenver.pvt";
	$username="student12";
	$password="4hhvIKODDoHG";
	$dbname="student12db";


	$conn = new mysqli($servername,$username,$password,$dbname);

	//Fruit query
	$fruitOne = $conn->query("SELECT * FROM FRUIT1");
	$fruitTwo = $conn->query("SELECT crop_num,yield_of_bushels,dollar_per_bushels FROM FRUIT2");

	//customer order query
	$customOrder1 = $conn->query("SELECT * FROM CUSTOM_ORDER ORDER BY date");


	//**************************************************************


	//******Error checking******************************************
	//checks if connected or not
	if($conn->connect_error)
	{
		die("Connection failed: <br>" . $conn->connect_error);
	}

	else
	{

	}
	//*************************************************************

	if($customOrder1->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>plant name</b></td>
			<td align='left'><b>order number</b></td>
			<td align='left'><b>customer number</b></td>
			<td align='left'><b>crop number</b></td>
			<td align='left'><b>purpose of the fruit</b></td>
			<td align='left'><b>quantity in bushels</b></td></tr>";

			while($summarryRows = $customOrder1->fetch_assoc())
			{
				echo "<tr><td align='left'>$summarryRows[plant_name]</td>
					<td align='left'>$summarryRows[order_num]</td>
					<td align='left'>$summarryRows[custom_num]</td>
					<td align='left'>$summarryRows[crop_num]</td>
					<td align='left'>$summarryRows[purpose_of_fruit]</td>
					<td align='left'>$summarryRows[quantity_in_bushels]</td></tr>";
			}
			echo "</table>";
	}
	else
	{
		echo "No Results.<br>";
	}
	echo "<br><br><br>";	
 ?>
</div>

<br><br><br><br><br><br><br><br><br>

	<div id="body">
	<h2 align="center">Bush-grown fruit summarry</h2>
<?php 


	//******Variables************************************************
	$servername="ucdencsesql05.ucdenver.pvt";
	$username="student12";
	$password="4hhvIKODDoHG";
	$dbname="student12db";


	$conn = new mysqli($servername,$username,$password,$dbname);

	//Bush-grown query

	$BushQuery = $conn->query("
	SELECT crop_num,plant_name,plant_type,max_num_bush 
	FROM FRUIT_SUB_BUSH_G
	");

	$avgBush = $conn->query("SELECT (AVG(max_num_bush)) average 
				 FROM FRUIT_SUB_BUSH_G");


	//**************************************************************


	//******Error checking******************************************
	//checks if connected or not
	if($conn->connect_error)
	{
		die("Connection failed: <br>" . $conn->connect_error);
	}

	else
	{

	}
	//*************************************************************

	if($BushQuery->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>plant name</b></td>
			<td align='left'><b>plant type</b></td>
			<td align='left'><b>crop number</b></td>
			<td align='left'><b>maximum number of bush</b></td></tr>";

			while($summarryRow = $BushQuery->fetch_assoc())
			{
				echo "<tr><td align='left'>$summarryRow[plant_name]</td>
					<td align='left'>$summarryRow[plant_type]</td>
					<td align='left'>$summarryRow[crop_num]</td>
					<td align='left'>$summarryRow[max_num_bush]</td>
					<td align='left'>$summarryRow[average]</td></tr>";
			}

			echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>average number of bush</b></td></tr>";
			while($antedote = $avgBush->fetch_assoc())
			{
				echo "<tr><td align='left'>$antedote[average]</td></tr>";
			}
			echo "</table>";

		echo "<br><br><br><br><br>";
	}
	else
	{
		echo "No Results.<br>";
	}
	echo "<br><br><br>";	
	
 ?>
</div>


	<div id="body">
	<h2 align="center">Vine-grown fruit summarry</h2>
<?php 


	//******Variables************************************************
	$servername="ucdencsesql05.ucdenver.pvt";
	$username="student12";
	$password="4hhvIKODDoHG";
	$dbname="student12db";


	$conn = new mysqli($servername,$username,$password,$dbname);

	//vine-grown query
	$VineQuery = $conn->query("SELECT * 
				   FROM FRUIT_SUB_VINE_G");
	//vine subtotal
	$vineSubtotal = $conn->query("SELECT (SUM(min_water_needed)) totWater FROM FRUIT_SUB_VINE_G");


	//**************************************************************


	//******Error checking******************************************
	//checks if connected or not
	if($conn->connect_error)
	{
		die("Connection failed: <br>" . $conn->connect_error);
	}

	else
	{

	}
	//*************************************************************

	if($BushQuery->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>plant name</b></td>
			<td align='left'><b>plant type</b></td>
			<td align='left'><b>crop number</b></td>
			<td align='left'><b>minimum water needed</b></td></tr>";

			while($summarryRow = $VineQuery->fetch_assoc())
			{
				echo "<tr><td align='left'>$summarryRow[plant_name]</td>
					<td align='left'>$summarryRow[plant_type]</td>
					<td align='left'>$summarryRow[crop_num]</td>
					<td align='left'>$summarryRow[min_water_needed]</td></tr>";
			}

			echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>total water needed</b></td></tr>";
			while($antedote = $vineSubtotal->fetch_assoc())
			{
				echo "<tr><td align='left'>$antedote[totWater]</td></tr>";
			}

			
			echo "</table>";

		echo "<br><br><br><br><br><br><br><br>";
	}
	else
	{
		echo "No Results.<br>";
	}
	echo "<br><br><br>";	
	
 ?>
</div>

	<div id="body">
	<h2 align="center">Tree-grown fruit summarry</h2>
<?php 


	//******Variables************************************************
	$servername="ucdencsesql05.ucdenver.pvt";
	$username="student12";
	$password="4hhvIKODDoHG";
	$dbname="student12db";


	$conn = new mysqli($servername,$username,$password,$dbname);

	//vine-grown query
	$TreeQuery = $conn->query("SELECT * 
				   FROM FRUIT_SUB_TREE_G");
	//vine subtotal
	$avgTreeHeight = $conn->query("SELECT (AVG(avg_height)) avgTree FROM FRUIT_SUB_TREE_G");


	//**************************************************************


	//******Error checking******************************************
	//checks if connected or not
	if($conn->connect_error)
	{
		die("Connection failed: <br>" . $conn->connect_error);
	}

	else
	{

	}
	//*************************************************************

	if($BushQuery->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>plant name</b></td>
			<td align='left'><b>plant type</b></td>
			<td align='left'><b>crop number</b></td>
			<td align='left'><b>tree height</b></td></tr>";

			while($summarryRow = $TreeQuery->fetch_assoc())
			{
				echo "<tr><td align='left'>$summarryRow[plant_name]</td>
					<td align='left'>$summarryRow[plant_type]</td>
					<td align='left'>$summarryRow[crop_num]</td>
					<td align='left'>$summarryRow[avg_height]</td></tr>";
			}

			echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>average tree height</b></td></tr>";
			while($antedote = $avgTreeHeight->fetch_assoc())
			{
				echo "<tr><td align='left'>$antedote[avgTree]</td></tr>";
			}

			
			echo "</table>";

		echo "<br><br><br><br><br><br><br><br>";
	}
	else
	{
		echo "No Results.<br>";
	}
	echo "<br><br><br>";	
	
 ?>
</div>


	<div id="body">
	<h2 align="center">Vine-grown fruit summarry</h2>
<?php 


	//******Variables************************************************
	$servername="ucdencsesql05.ucdenver.pvt";
	$username="student12";
	$password="4hhvIKODDoHG";
	$dbname="student12db";


	$conn = new mysqli($servername,$username,$password,$dbname);

	//vine-grown query
	$VineQuery = $conn->query("SELECT * 
				   FROM FRUIT_SUB_VINE_G");
	//vine subtotal
	$vineSubtotal = $conn->query("SELECT (SUM(min_water_needed)) totWater FROM FRUIT_SUB_VINE_G");


	//**************************************************************


	//******Error checking******************************************
	//checks if connected or not
	if($conn->connect_error)
	{
		die("Connection failed: <br>" . $conn->connect_error);
	}

	else
	{

	}
	//*************************************************************

	if($BushQuery->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>plant name</b></td>
			<td align='left'><b>plant type</b></td>
			<td align='left'><b>crop number</b></td>
			<td align='left'><b>minimum water needed</b></td></tr>";

			while($summarryRow = $VineQuery->fetch_assoc())
			{
				echo "<tr><td align='left'>$summarryRow[plant_name]</td>
					<td align='left'>$summarryRow[plant_type]</td>
					<td align='left'>$summarryRow[crop_num]</td>
					<td align='left'>$summarryRow[min_water_needed]</td></tr>";
			}

			echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>total water needed</b></td></tr>";
			while($antedote = $vineSubtotal->fetch_assoc())
			{
				echo "<tr><td align='left'>$antedote[totWater]</td></tr>";
			}

			
			echo "</table>";

		echo "<br><br><br><br><br><br><br><br>";
	}
	else
	{
		echo "No Results.<br>";
	}
	echo "<br><br><br>";	
	
 ?>
</div>

	<div id="body">
	<h2 align="center">Government subsidy</h2>
<?php 


	//******Variables************************************************
	$servername="ucdencsesql05.ucdenver.pvt";
	$username="student12";
	$password="4hhvIKODDoHG";
	$dbname="student12db";


	$conn = new mysqli($servername,$username,$password,$dbname);

	//Govt subsidy query
	$GovtQuery = $conn->query("SELECT * 
				   FROM GOVT_SUBSIDY");

	$Govt2Query = $conn->query("SELECT * 
				    FROM GOVT_SUBSIDY2");

	$Govt3Query = $conn->query("SELECT * 
				   FROM GOVT_SUBSIDY3");
	//vine subtotal
	$GovtSubtotal = $conn->query("SELECT (SUM(amount)) totAmount FROM GOVT_SUBSIDY");


	//**************************************************************


	//******Error checking******************************************
	//checks if connected or not
	if($conn->connect_error)
	{
		die("Connection failed: <br>" . $conn->connect_error);
	}

	else
	{

	}
	//*************************************************************

	if($GovtQuery->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>plant name</b></td>
			<td align='left'><b>subsidy number</b></td>
			<td align='left'><b>subsidy name</b></td>
			<td align='left'><b>number of organic food sold</b></td>
			<td align='left'><b>organic</b></td>
			<td align='left'><b>amount</b></td></tr>";

			while($summarryRow = $GovtQuery->fetch_assoc())
			{
				echo "<tr><td align='left'>$summarryRow[plant_name]</td>
					<td align='left'>$summarryRow[subsidy_num]</td>
					<td align='left'>$summarryRow[subsidy_name]</td>
					<td align='left'>$summarryRow[num_organic_food_sold]</td>
					<td align='left'>$summarryRow[organic]</td>
					<td align='left'>$summarryRow[amount]</td></tr>";
			}	

			echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>subtotal</b></td></tr>";
			while($antedote = $GovtSubtotal->fetch_assoc())
			{
				echo "<tr><td align='left'>$antedote[totAmount]</td></tr>";
			}	
	
			echo "</table>";

		echo "<br><br><br><br><br><br><br><br>";
	}
	else
	{
		echo "No Results.<br>";
	}
	echo "<br><br><br>";	

	if($Govt2Query->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>date applied</b></td>
			<td align='left'><b>subsidy number</b></td></tr>";

			while($summarryRow = $Govt2Query->fetch_assoc())
			{
				echo "<tr><td align='left'>$summarryRow[date_applied]</td>
				<td align='left'>$summarryRow[subsidy_num]</td></tr>";
			}
			echo "</table>";
	}
	else
	{
		echo "No Results.<br>";
	}

	if($Govt3Query->num_rows != 0)
	{
		echo "<table align='left' cellspacing='5' cellpadding='8'><tr>
			<td align='left'><b>date payout</b></td>
			<td align='left'><b>subsidy number</b></td></tr>";

			while($summarryRow = $Govt3Query->fetch_assoc())
			{
				echo "<tr><td align='left'>$summarryRow[date_payout]</td>
				<td align='left'>$summarryRow[subsidy_num]</td></tr>";
			}
			echo "</table>";

		echo "<br><br><br><br><br><br><br><br>";
	}
	else
	{
		echo "No Results.<br>";
	}
	echo "<br><br><br>";
	
 ?>
</div>

</body>
</html>

