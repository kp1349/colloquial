<?php
session_start();
if(isset($_SESSION) && ($_SESSION['user']!=''))
{
	echo "you are already logged in";
}
else
{
	echo('
	First time? Register here:<br>
	<form action="register_processing.php" method="post">
	First Name:<br>
	<input type="text" name="first"><br>
	Last Name:<br>
	<input type="text" name="last"><br>
	Zip Code:<br>
	<input type="number" pattern=".{5,5}" min="00001" max="99999" name="zip"><br>
	Username:<br>
	<input type="text" name="user"><br>
	Password:<br>
	<input type="password" name="pass"><br>
	<input type="submit" value="Register">
	</form>
	');
}
?>

