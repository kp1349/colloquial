<html>
	<head>
<?php
	include 'connect.php';
	session_start();
	$debug=$_SESSION['debug'];
?>
<?php

$username = $_POST['username'];
$password = $_POST['password'];
$qry = "SELECT password FROM member WHERE username = '$username'";
$result = $sql->query($qry);
if (!$result) 
{
	echo 'error<br>';
	echo('<meta http-equiv="refresh" content="2; url=index.php">');
}
$row = $result->fetch_assoc();
if($row['password']==''){
	echo 'not a valid username<br>';
	echo('<meta http-equiv="refresh" content="2; url=index.php">');
	
}
else if (md5($password)==$row['password'])
{
	echo 'logged in<br>';
	$_SESSION['user']=$username;
	echo('<meta http-equiv="refresh" content="2; url=index.php">');
}
else
{
	echo 'incorrect password<br>you will be redirected to enter your credentials again';
	echo('<meta http-equiv="refresh"
   content="2; url=index.php">');
}
echo '<br /><a href="index.php">home</a>';
?>
	</head>
</html>