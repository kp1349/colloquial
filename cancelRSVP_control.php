<?php
function RSVP($event_id)
{
	include("connect.php");
	session_start();
	$user=$_SESSION['user'];
	$uQry="SELECT rsvp FROM eventuser WHERE event_id='$event_id' AND username='$user'";
	$ok=false;
	$result=$sql->query($uQry);
	if($result->num_rows>0)
	{
		while ($row=$result->fetch_assoc())
		{
			if ($row['rsvp']==1)
			{
				$ok=true;
			}
		}
	}
	if ($ok)
	{
		echo('<form action="cancelRSVP.php" method="post">UN-RSVP:<input id="tea-submit" type="submit" name = "submit" value="');
		echo $event_id;
		echo('"></form>');
	}
	else
	{
		echo('<form action="reRSVP.php" method="post">RE-RSVP:<input id="tea-submit" type="submit" name = "submit" value="');
		echo $event_id;
		echo('"></form>');
	}
}


?>