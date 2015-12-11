<?php
	include 'connect.php';
	session_start();
	$debug=$_SESSION['debug'];
	if(isset($_SESSION) && ($_SESSION['user']!='')) {
		echo "<h2>My upcoming events:</h2>";
		$user = $_SESSION['user'];
	

		$squery = "SELECT an_event.event_id, group_name, title, an_event.description descr, DATE_FORMAT(`start_time`, '%Y-%m-%d %H:%i') start_time, DATE_FORMAT(`end_time`, '%Y-%m-%d %H:%i') end_time, lname, zip
					    FROM a_group JOIN an_event ON an_event.group_id=a_group.group_id JOIN eventuser ON an_event.event_id=eventuser.event_id
					    WHERE eventuser.username='$user' AND rsvp=1 AND start_time >= date(now()) AND start_time < date(now())+4 ORDER BY an_event.start_time ASC";
		displayQry($squery, $debug);
		$sresult = $sql->query($squery);

		if($sresult->num_rows > 0) {
			echo "<table border = '1'>
			<tr style='font-weight:bold'>
			<td>Event ID</td><td>Group</td><td>Event</td><td>Description</td><td>Start Time</td><td>End Time</td><td>Location</td><td>Zip</td>
			</tr>";

			while($row = $sresult->fetch_array()) {
				echo "<tr><td>" .
				$row['event_id'] . "</td><td>" . 
				$row['group_name'] . "</td><td>" . 
				$row['title'] . "</td><td>" . 
				$row['descr'] . "</td><td>" . 
				$row['start_time'] . "</td><td>" . 
				$row['end_time'] . "</td><td>" . 
				$row['lname'] . "</td><td>" . 
				$row['zip'] . "</td></tr>\n";
			}

			echo "</table>\n";

		}

		else
			echo "You did not RSVP to any events at this time.";
    
    echo '<h2>View my events between a date range:</h2>
    <form action="upcomingEvents2.php" method="post">
    Start Date:<br>
    <input type="date" name="start"><br>
	  End Date:<br>
	  <input type="date" name="end"><br><br>
    <input type="submit" value="Show events"><br><br>
	  </form>';
	}
?>