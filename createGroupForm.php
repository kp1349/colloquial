<html>
<head>
  <title>
    Create a Group
  </title>
</head>
<body>
  <?php
    include("connect.php");
    session_start();
    $DEBUG=$_SESSION['debug'];



    if(isset($_SESSION) && ($_SESSION['user']!=''))
    {
      if ($DEBUG) echo ("logged in as <br>".$_SESSION['user']);
      echo('
      <br>Please create a group:<br>
      <form action="createGroup_processing.php" method="post">
        <br>Group Name:<br>
        <input type="text" name="groupName">
        <br>Group Description:<br>
        <input type="text" name="groupDesc">
      <br>
      <input type="submit" value="Done">
      <br>
      </form>
      ');
      //still have to add the drop down
      //still have to add the link to making a new interest
    }
    else
    {
      echo "not logged in";
      echo('<meta http-equiv="refresh" content="2; url=index.php">');
    }
  ?>
</body>
</html>
