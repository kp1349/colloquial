<?php
  include 'connect.php';
  session_start();
  $debug=$_SESSION['debug'];

	$interest=$_POST['interest'];

	$squery = "SELECT group_name 
				FROM groupinterest JOIN a_group ON groupinterest.group_id = a_group.group_id
				WHERE interest_name='$interest'
        ORDER by group_name";
    displayQry($squery, $debug);
	$sresult = $sql->query($squery);
  
  if($sresult->num_rows>0) {
    echo "<h2>Groups:</h2>";
    
    while($row = $sresult->fetch_assoc()) {
	    echo $row['group_name'] . "<br>";
      }
  }
  
  else
    echo "No groups found.";
    
  echo '<br><a href="index.php">Home</a>';
?>