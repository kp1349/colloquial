<?php
  //include("connect.php");
  session_start();
  if(isset($_SESSION) && ($_SESSION['user']!=''))
  {
    echo ('
    Make an Interest:<br>
    <form action="createInterestForm_processing.php" method="POST">
      Type in interest name:<br>
      <input type="text" name="interest">
      <br>
      <input type="submit" value="Done">
    </form>
    ');
  }
  else {
    echo "you are not logged in<br>";
    echo '<meta http-equiv="refresh" content="2; url=index.php">';
  }
?>
