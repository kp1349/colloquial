<?php
	//session_start();
	include("connect.php");
	session_start();
	$DEBUG=$_SESSION['debug'];
	$lname=$_POST['lname'];
	$zip=$_POST['zip'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$desc=$_POST['desc'];
	$lon=$_POST['lon'];
	$lat=$_POST['lat'];
	
	echo("
	Data gathered<br>
	$lname<br>
	$zip<br>
	$street<br>
	$city<br>
	$desc<br>
	$lon<br>
	$lat<br>
	");
	
	$lQry="INSERT INTO location (lname, zip, street, city, description, latitude, longitude)
	VALUES
	('$lname','$zip','$street','$city','$desc','$lon','$lat')";
	
	displayQry($lQry, $DEBUG);
	
	if($sql->query($lQry))
	{
		echo "successful";
	}
	else
	{
		echo "error:<br>";
		echo $sql->error;
		echo "<br>";
	}
	echo ('
	<meta http-equiv="refresh" content="2; url=index.php">
<form action="index.php">
	<input type="submit" value="Home">
</form>
	');	
?>