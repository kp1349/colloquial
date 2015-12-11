<?php
  include 'connect.php';
  session_start();
	$user = $_SESSION['user'];
	$group=$_POST['group'];
	$debug=$_SESSION['debug'];
   
   $cquery="SELECT username FROM a_group WHERE a_group.group_id='$group'";
   displayQry($cquery, $debug);
   $cresult = $sql->query($cquery);
   
   while($crow = $cresult->fetch_assoc()) {
	    echo "<h2>Creator of group " . $group . ": " . $crow['username'] . "</h2><br>";
      }
    
   
	$mquery = "SELECT a_group.username as creator, groupuser.username as member
				FROM a_group JOIN groupuser ON a_group.group_id=groupuser.group_id
        WHERE a_group.username != groupuser.username AND a_group.group_id='$group'
				ORDER BY member ASC";
	displayQry($mquery, $debug);
	$mresult = $sql->query($mquery);
  
  if($mresult->num_rows>0) {
    echo "<h2>Members:</h2>";
    while($row = $mresult->fetch_assoc()) {
	    echo $row['member'] . "<br>";
      }
   }
   else
    echo "No members found.";
   
   
  //ADD A FRIEND (can't add yourself as a friend and can't add people you're already friends with)
  $fquery = "SELECT username 
				FROM groupuser 
				WHERE group_id='$group' AND username != '$user' AND username NOT IN (SELECT friend_name FROM friend WHERE username = '$user')
				ORDER BY username ASC";
	displayQry($fquery, $debug);
	$fresult = $sql->query($fquery);
  
  if($fresult->num_rows>0) {
	  echo '<h2>Add a friend:</h2>
	  <form action="addedFriend.php" method="post">
    <select name = "friend">';

	  while($frow = $fresult->fetch_assoc()) {
		  echo "<option value=" . $frow['username'] . ">" . $frow['username'] . "</option>";
	  }

	  echo '</select>
	  <input type="submit" value="Add friend">
	  </form><br><br>';
  }
    
  echo '<br><a href="index.php">Home</a>';
?>