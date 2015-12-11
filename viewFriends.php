<?php
	include 'connect.php';
	session_start();
	$debug=$_SESSION['debug'];
	$user = $_SESSION['user'];

	echo "<h2>My friends:</h2>";

	$squery="SELECT friend_name FROM friend WHERE username='$user' ORDER BY friend_name ASC";
	displayQry($squery, $debug);
	$sresult = $sql->query($squery);
  
	  if($sresult->num_rows>0) {
		while($row = $sresult->fetch_assoc()) {
			echo $row['friend_name'] . "<br>";
		  }
	   }
	   else {echo "No friends found.";}
?>