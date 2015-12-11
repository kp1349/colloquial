<html>
<header>
<?php
	include("connect.php");
	session_start();
	$DEBUG=$_SESSION['debug'];
?>
</header>
<body>
	<h1>
		Create Event
	</h1>
	<?php
	if(!$_SESSION['user']){
		echo('
		Sorry, you are not logged in, you will now be redirected back to the login page<br>
		<meta http-equiv="refresh" content="2; url=index.php">
		');
	}
	else
	{
		//SQL stuff
		if ($DEBUG) echo "logged in ... <br>";
		$user = $_SESSION['user'];
		$gqry="SELECT group_id, group_name FROM a_group WHERE username='$user'";
		$lqry="SELECT lname, zip FROM location";
		
		//if($DEBUG) echo "<br>running SQL:<br>$gqry<br>";
		displayQry($gqry, $DEBUG);
		
		$gresult = $sql->query($gqry);
		
		//if($DEBUG) echo "<br>running SQL:<br>$lqry<br>";
		displayQry($lqry, $DEBUG);
		
		$lresult = $sql->query($lqry);

		//DEBUG checks:
		if (!$gresult && $DEBUG)
		{
			echo "didn't get group result<br>";
		}
		if (!$lresult && $DEBUG)
		{
			echo "didn't get location result<br>";
		}

		//Beginning of form:
		if ($gresult->num_rows>0)
		{
			echo('
			<form action="createEvent_processing.php" method="post">
			group:<br>
			<select name="groupID">
			');
			//show the groups we got from the database
			while($grow = $gresult->fetch_assoc())
			{
				echo("
				<option value=". $grow['group_id'] . ">" . $grow['group_name'] . "</option>
				");
			}
			//output the form
			echo('
			</select><br>
			title:<br>
			<input type="text" name="title"><br>
			description:<br>
			<input type="text" name="desc"><br>
			start time:<br>
			<input type="datetime-local" name="start"><br>
			end time:<br>
			<input type="datetime-local" name="end"><br>
			location:<br>
			<select name="locationName">
			');
			if ($lresult->num_rows>0)//if we get location(s) from the database
			{
				while($lrow=$lresult->fetch_assoc())
				{
					$location = $lrow['zip'].'-'.$lrow['lname'];
					echo('
				<option value="'.$location.'">'.$location.' </option>
				');
				}
			}
			else//if there is no location in the database
			{
				echo 'Please make a location first.  Click <a href="createLocation.php">here</a><br>';
			}
			echo('
			</select><br>
			<input type="submit" name="Sumbit">
			</form>
			');
		}
		//if the user can't make an event
		else if ($gresult->num_rows==0)
		{
			echo "You are not allowed to create an event for any group<br>";
			echo('<meta http-equiv="refresh" content="2; url=index.php">');
		}
		//'something went wrong
		else
		{
			echo "something went wrong ... <br>";
			echo('<meta http-equiv="refresh" content="2; url=index.php">');
		}
		//finish the form
		echo('
			<form action="index.php" >
			<input type="submit" value="Home">
			</form>
		');
	}
?>