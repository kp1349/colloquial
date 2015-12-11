<?php
	include("connect.php");
	session_start();
	$user = $_SESSION['user'];
	$event_id = $_POST['submit'];
	$debug=$_SESSION['debug'];

	$rQry = "UPDATE eventuser SET rsvp='1' WHERE event_id='$event_id' AND username='$user'";
	
	displayQry($rQry, $debug);

	if(isset($_SESSION) && ($_SESSION['user']!=''))
	{
		if ($sql->query($rQry))
		{
			echo "successfully RSVP'd";
		}
		else
		{
			echo "Unsuccessful: ";
			echo $sql->error;
		}
	}
	else
	{
		echo "you are not logged in";
	}
	echo ('
	<meta http-equiv="refresh" content="2; url=index.php">
<form action="index.php">
	<input type="submit" value="Home">
</form>
	');
	?>