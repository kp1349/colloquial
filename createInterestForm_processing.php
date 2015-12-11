<?php
  include("connect.php");
  session_start();
  $DEBUG=$_SESSION['debug'];

  $interest=$_POST['interest'];

  $iQry = "INSERT INTO interest
  (interest_name)
  VALUES
  ('$interest')";

  displayQry($iQry, $DEBUG);
  
  if ($sql->query($iQry))
  {
    echo "successfully added";
  }
  else
  {
    echo "unsuccessful<br>";
    echo $sql->error;
    echo "<br>";
  }
  echo ('
	<meta http-equiv="refresh" content="2; url=index.php">
<form action="index.php">
	<input type="submit" value="Home">
</form>
	');
?>
