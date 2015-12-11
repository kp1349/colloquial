<?php
include("connect.php");
session_start();
$DEBUG=$_SESSION['debug'];
$user = $_SESSION['user'];
$gqry="SELECT G.group_id, G.group_name FROM a_group AS G JOIN groupuser AS U ON G.group_id=U.group_id WHERE U.username='$user'";
displayQry($gqry, $DEBUG);
$gresult = $sql->query($gqry);

displayQry($gqry, $DEBUG);

while($grow = $gresult->fetch_assoc())
{
  echo("
  <option value=". $grow['group_id'] . ">" . $grow['group_name'] . "</option>
  ");
}
?>