<?php
	include 'connect.php';
	session_start();
	$debug=$_SESSION['debug'];
	
	$first=$_POST['first'];
	$last=$_POST['last'];
	$zip=$_POST['zip'];
	$user=$_POST['user'];
	$pass=md5($_POST['pass']);
	
	$bool=false;
	if (($first!='')&&($last!='')&&($zip!='')&&($user!='')&&($pass!='')) {
		$bool=true;
	}

	$cQry="SELECT COUNT(username) FROM member WHERE username='$user'";
	displayQry($cQry, $debug);
	$cResult=$sql->query($cQry);
	$cRow=$cResult->fetch_assoc();
	if($cRow['COUNT(username)']>0)
	{
		echo "sorry, that username is already taken";	
	}
	else if($bool)
	{
		$rQry="INSERT INTO member (username, password, firstname, lastname, zipcode)
		VALUES
		('$user','$pass','$first','$last','$zip')";
		displayQry($rQry,$debug);
		if($sql->query($rQry))
		{
			echo "You are now a member!";
		}
		else
		{
			if($debug)
			{
				echo "unsuccessful<br>";
				echo $sql->error;
			}
		}
	}
	else
	{
		echo "sorry, something went wrong<br>please try again and make sure you filled out everything<br>";
	}
	echo ('
	<meta http-equiv="refresh" content="2; url=index.php">
<form action="index.php">
	<input type="submit" value="Home">
</form>
	');
?>

