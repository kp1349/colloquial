<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Colloquial</title>
</head>

<body>
<?php
	include("connect.php");
	session_start();
	$user = $_SESSION['user'];
	$DEBUG=FALSE;
	$_SESSION['debug']=$DEBUG;
	
	$gqry="SELECT group_id, group_name FROM a_group";
	//don't show a group that they already joined in the drop down?
	
	if(isset($_SESSION) && ($_SESSION['user']!=''))
	{
		echo "Welcome back, ";
		echo $_SESSION['user'];
		echo('
		<form action="logout.php" >
		<input type="submit" value="Logout">
		</form>
		');
		
		echo "<h3>Join a Group!</h3>";
		echo('
		<form action="userJoinGroup.php" method="post">
		pick a group to join:<br>
		<select name="group_id">
		');
		if($DEBUG) echo "<br>running SQL:<br>$gqry<br>";
		displayQry($gqry,$DEBUG);
		$gresult = $sql->query($gqry);
		if (!$gresult && $DEBUG)
		{
			echo "didn't get group result<br>";
		}
		while($grow = $gresult->fetch_assoc())
		{
			echo("
			<option value=". $grow['group_id'] . ">" . $grow['group_name'] . "</option>
			");
		}
		echo('
		</select>
		<input type="submit" value="Join">
		</form>
		');
		
		include 'upcomingEvents.php';

		echo '<h2>Display other members of my groups:</h2>
		<form action="displayGroupMembers.php" method="post">
		<select name = "group">';
			include 'displayMemberGroups.php';
			echo '</select>
		<input type="submit" value="Show members"></form>';

		include 'viewFriends.php';

		echo '<br><br>
		<form action="rateEvent.php"><input type="submit" value="Rate an Event"></form><br>
		<form action="createGroupForm.php"><input type="submit" value="Create a Group"></form><br>
		<form action="createEventForm.php"><input type="submit" value="Create an Event"></form><br>
		<form action="createInterestForm.php"><input type="submit" value="Create an Interest"></form><br>
		<form action="createLocation.php"><input type="submit" value="Create a Location"></form><br>
		<form action="connectInterestToGroup.php"><input type="submit" value="Add an interest to a group"></			form><br>';
	}

	else
	{
		include 'login.php';
		echo "<br><br>";
		include 'register.php';
	}
?>

<?php
	//PUBLIC INFO
	
	echo '<h2>View all events between a date range:</h2>';
	echo '<form action="displayEvent2.php" method="post">';
	include 'displayEvent.php';
	echo '</form>';

	echo "<h2>Select an interest to view groups:</h2>";
	echo '<form action="displayGroup2.php" method="post">
        <select name = "interest">';
	include 'displayInterest.php';
	echo '</select>
		<input type="submit" value="Show groups"></form><br><br>';

	
?>

</body>
</html>
