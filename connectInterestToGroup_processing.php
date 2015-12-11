<?php
include("connect.php");
session_start();
$debug=$_SESSION['debug'];
$group_id=$_POST['group_id'];
$interest=$_POST['interest'];


echo("
recieved:<br>
$group_id<br>
$interest<br>
");

$iTOgQry = "INSERT INTO groupinterest
(interest_name, group_id)
VALUES
('$interest','$group_id')";

displayQry($iTOgQry,$debug);

if ($sql->query($iTOgQry))
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
