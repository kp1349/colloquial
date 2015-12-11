<html>
<?php
	include("connect.php");
	session_start();
	$DEBUG = $_SESSION['debug'];

	$groupID=$_POST['groupID'];
	$title=$_POST['title'];
	$desc=$_POST['desc'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	$lTemp=$_REQUEST['locationName'];
	$lTemp2=explode('-',$lTemp,2);
	$zip=$lTemp2[0];
	$lname=$lTemp2[1];


	if ($DEBUG)
	{
		echo "Data gathered: <br>";
		echo("$groupID<br>");
		echo("$title<br>");
		echo("$desc<br>");
		echo("$start<br>");
		echo("$end<br>");
		echo("$lname<br>");
		echo("$zip<br>");
	}
	$eQry="INSERT INTO an_event
	(title, description,start_time, end_time, group_id, lname, zip)
	VALUES
	('$title', '$desc', '$start', '$end', '$groupID', '$lname', '$zip')";

	//if($DEBUG) echo "<br>running SQL:<br>$eQry<br>";
	displayQry($eQry, $DEBUG);
	
	if ($sql->query($eQry))
	{
		echo("successful<br>");
	}
	else
	{
		echo "Error: ";
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
