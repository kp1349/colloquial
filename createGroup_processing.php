<?php
  include("connect.php");
  session_start();
  $DEBUG=$_SESSION['debug'];

  $groupID=$_POST['groupID'];

  $user=$_SESSION['user'];
  $groupName=$_POST['groupName'];
  $groupDesc=$_POST['groupDesc'];
  $interest=$_POST['interest'];

  if ($DEBUG)
  {
    echo("
    $user<br>
    $groupName<br>
    $groupDesc<br>
    $interest<br>
    ");
  }

  $gQry="INSERT INTO a_group
	(group_name, description, username)
	VALUES
	('$groupName', '$groupDesc', '$user')";

  displayQry($gQry ,$DEBUG);

  //$idQry="SELECT group_id FROM a_group WHERE group_name=$groupName AND description=$groupDesc AND username=$user";

  if ($sql->query($gQry))
	{
		echo("successful<br>");
    //$idResult=$sql->query($idQry);
    //$idRow=$idResult->fetch_array();
    //$group_id=$idRow['group_id'];
    //echo $group_id;
	}
	else
	{
		echo "Error: ";
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