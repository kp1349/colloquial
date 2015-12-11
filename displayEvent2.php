<?php
	  include 'connect.php';
    session_start();
    $user=$_SESSION['user'];
    echo "<br>";
    $debug=$_SESSION['debug'];
    
	  $start=$_POST['start'];
	  $end=$_POST['end'];
    
    echo '<br><a href="index.php">Home</a><br>';
    
    $squery = "SELECT event_id, group_name, title, an_event.description descr, DATE_FORMAT(`start_time`, '%Y-%m-%d %H:%i') start_time, DATE_FORMAT(`end_time`, '%Y-%m-%d %H:%i') end_time, lname, street, city, zip 
    FROM a_group JOIN an_event ON a_group.group_id=an_event.group_id JOIN location USING (lname, zip)
	  WHERE start_time >= date('$start') AND start_time < date('$end') ORDER BY an_event.start_time ASC";
	  displayQry($squery, $debug); 
    $sresult = $sql->query($squery);
  
	  if($sresult->num_rows>0) {
	    echo "<h2>Events:</h2>";
      echo "<table border = '1'>\n";
      echo "<tr style='font-weight:bold'>";
      echo "<td>RSVP</td><td>Group</td><td>Event</td><td>Description</td><td>Start Time</td><td>End Time</td><td>Location</td><td>Address</td>";
      echo "</tr>";
            
      while($row = $sresult->fetch_array()) {
        echo "<tr><td>";
        
        
        include("RSVP_control.php");
        RSVP($row['event_id']);
        echo "</td><td>" . 
        
        $row['group_name'] . "</td><td>" . 
        $row['title'] . "</td><td>" . 
        $row['descr'] . "</td><td>" . 
        $row['start_time'] . "</td><td>" . 
        $row['end_time'] . "</td><td>" . 
        $row['lname'] . "</td><td>" . 
        $row['street'] . ", " . $row['city'] . " " . $row['zip'] . "</td>";
        
      }
        
      echo "</table>\n";
  }

	else
		echo "No events found.<br>";

	
?>
