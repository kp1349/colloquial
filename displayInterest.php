<?php
	include 'connect.php';
	session_start();
	$debug=$_SESSION['debug'];

	//echo "<h1>Select an interest to view groups:</h1>";

	$squery = "SELECT interest_name FROM interest";
	displayQry($squery, $debug);
	$sresult = $sql->query($squery);

	//echo '<form action="displayGroup2.php" method="post">
        //<select name = "interest">';

	while($row = $sresult->fetch_assoc()) {
		echo "<option value=" . $row['interest_name'] . ">" . $row['interest_name'] . "</option>";
	}

	//echo '</select>
	//	<input type="submit" value="Show groups"><br><br>
	//	</form><br><br>';
?>
