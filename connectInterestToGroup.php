<?php
include("connect.php");
session_start();
if(isset($_SESSION) && ($_SESSION['user']!=''))
  {
	echo '<form action="connectInterestToGroup_processing.php" method="POST">';
    echo "Select Group:<br>";
    echo '<select name="group_id">';
    include("displayUserGroups.php");
    echo "</select>";
  }
  else {
    echo "sorry, you are not logged in<br>";
    echo('
    <meta http-equiv="refresh" content="2; url=index.php">
<form action="index.php">
	<input type="submit" value="Home">
</form>
    ');
  }
  echo "Select an interest:<br>";
  echo '<select name="interest">';
  include("displayInterest.php");
  echo ('
  </select>
  <input type="submit" value="Done">
  </form>
  ');

 ?>
