<?php
	include("connect.php");
	session_start();
	$user=$_SESSION['user'];
	if(isset($_SESSION) && ($_SESSION['user']!=''))
	{
		echo("
		Welcome back, $user<br>
		");
		echo('
		<form action="createLocation_processing.php" method="post">
		Location name:<br>
		<input type="text" name="lname"><br>
		Zip Code:<br>
		<input type="number" min="00000" max="99999" name="zip"><br>
		Street:<br>
		<input type="text" name="street"><br>
		City:<br>
		<input type="text" name="city"><br>
		Description:<br>
		<input type="text" name="desc"><br>
		Longitude:<br>
		<input type="number" name="lon" min="-180.00" max="180.00"><br>
		Latitude:<br>
		<input type="number" name="lat" min="-90.00" max="90.00"><br>
		<input type="submit" value="Done">
		</form>
		');
	}
	else
	{
		echo "You are not logged in<br>";
		echo('<meta http-equiv="refresh" content="2; url=index.php">');
		echo('<form action="index.php"><input type="submit" value="Home"></form>');
	}
	?>
