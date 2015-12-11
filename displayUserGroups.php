<?php
include("connect.php");
session_start();
$DEBUG=$_SESSION['debug'];
$user = $_SESSION['user'];
$gqry="SELECT group_id, group_name FROM a_group WHERE username='$user'";
displayQry($gqry, $DEBUG);
$gresult = $sql->query($gqry);

/*
if($DEBUG) echo "<br>running SQL:<br>$gqry<br>";
if (!$gresult && $DEBUG)
{
  echo "didn't get group result<br>";
}

echo '<h2>Display members of a group:</h2>
<form action="displayGroupMembers.php" method="post">
<select name = "group">';
*/

displayQry($gqry, $DEBUG);

while($grow = $gresult->fetch_assoc())
{
  echo("
  <option value=". $grow['group_id'] . ">" . $grow['group_name'] . "</option>
  ");
}
/*
echo '</select>
<input type="submit" value="Show members"><br><br>
</form><br><br>';
*/
 ?>
