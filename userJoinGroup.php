<?php
include("connect.php");
session_start();
$user=$_SESSION['user'];
$group_id=$_POST['group_id'];
$debug=$_SESSION['debug'];
if($debug){
echo("
$user<br>
$group_id<br>
");
}

$uQry="INSERT INTO groupuser (group_id, username, authorized)
VALUES
('$group_id', '$user', '0')";
displayQry($uQry, $debug);
if ($sql->query($uQry))
{
  echo "successful";
}
else
{
  echo "unsuccessful";
}
echo ('
	<meta http-equiv="refresh" content="2; url=index.php">
<form action="index.php">
	<input type="submit" value="Home">
</form>
	');
?>
