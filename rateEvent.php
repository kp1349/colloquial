<?php
	include 'connect.php';
    session_start();
    $DEBUG=$_SESSION['debug'];
    $user=$_SESSION['user'];

		echo '<h2>View all events between a date range:</h2>';
		echo '<form action="rateEvent2.php" method="post">';
		include 'displayEvent.php';
		echo '</form>';
	
?>