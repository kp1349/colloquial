<?php
	include 'connect.php';
    session_start();
	$DEBUG=$_SESSION['debug'];
    $user=$_SESSION['user'];
	
	include 'displayEvent2.php';

	//can only rate past events
	$equery="SELECT event_id FROM an_event WHERE start_time >= date('$start') AND start_time < date(now())";
	displayQry($equery, $DEBUG);
	$eresult = $sql->query($equery);

	echo '<h2>Rate an event out of 5 stars</h2>
	<form action="rateEvent3.php" method="post">
	Event ID: 
    <select name = "event">';
		
	while($row = $eresult->fetch_assoc()) {
		echo "<option value=" . $row['event_id'] . ">" . $row['event_id'] . "</option>";
	}
	echo '</select><br>

	Rating: 
	<select name = "rating">
		<option value="1">1 star</option>
		<option value="2">2 stars</option>
		<option value="3">3 stars</option>
		<option value="4">4 stars</option>
		<option value="5">5 stars</option>
	</select><br>
	<input type="submit" value="Rate"></form><br><br>';
	

	
?>