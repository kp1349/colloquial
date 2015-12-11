<?php
function RSVP($event_id)
{
	include("connect.php");
	session_start();
	$user=$_SESSION['user'];
	$uQry="SELECT username FROM groupuser NATURAL JOIN an_event WHERE an_event.event_id='$event_id' AND an_event.start_time>=now()";
	$ok=false;
	$result=$sql->query($uQry);
	if($result->num_rows>0)
	{
		while ($row=$result->fetch_assoc())
		{
			if ($row['username']==$user)
			{
				$ok=true;
			}
		}
	}
	if ($ok)
	{
		echo('<form action="RSVP.php" method="post"><input id="tea-submit" type="submit" name = "submit" value="');
		echo $event_id;
		echo('"></form>');
	}
	else
	{
		echo $event_id;
	}
}


?>