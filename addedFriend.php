<?php
	include 'connect.php';
	session_start();
	$user = $_SESSION['user'];
	$friend=$_POST['friend'];
	$debug=$_SESSION['debug'];
	
	$squery="INSERT INTO friend
	(username, friend_name)
	VALUES
	('$user', '$friend')";
	
	displayQry($squery, $debug);
  
	if ($sresult = $sql->query($squery)) {
		echo "Successfully added " . $friend . " as a friend <br>";
	}

	else {
		echo "Error: ";
		echo $sql->error;
		echo "<br>";
	}
    echo '<br><a href="index.php">Home</a>';
?>