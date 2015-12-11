<?php
	include 'connect.php';
    session_start();
	$DEBUG=$_SESSION['debug'];
    $user=$_SESSION['user'];
	$event=$_POST['event'];
	$rating=$_POST['rating'];

	$uQry="SELECT event_id, username FROM eventuser WHERE event_id='$event' AND username='$user'";
	$uresult=$sql->query($uQry);

   
	if($uresult->num_rows>0) {
		$rquery="UPDATE eventuser SET rating='$rating' WHERE event_id='$event' AND username='$user'";

		if($rresult = $sql->query($rquery))
			echo "Successfully rated event.";
		else
			echo"Could not rate event.";
			
	}

	
	else {
		$squery="INSERT INTO eventuser (event_id, username, rsvp, rating) VALUES ('$event', '$user', 0, '$rating')";

		if($sresult = $sql->query($squery))
			echo "Successfully rated event.";
		else
			echo"Could not rate event.";
	}
	
	echo ('
	<meta http-equiv="refresh" content="2; url=index.php">
<form action="index.php">
	<input type="submit" value="Home">
</form>
	');

?>