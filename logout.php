<?php
	session_start();
	if($_SESSION['user'])
	{
		echo "Logging out .... <br>";
		session_unset();
	}
	echo ('
	<meta http-equiv="refresh" content="2; url=index.php">
<form action="index.php">
	<input type="submit" value="Home">
</form>
	');
	//echo $_SESSION['user'];
	?>