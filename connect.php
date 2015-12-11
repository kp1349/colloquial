<html>
	<?php
		$DEBUG = FALSE;
		$port = 3306;
		$host = "us-cdbr-azure-west-c.cloudapp.net:$port";
		$user = "";
		$pass = "";
		$db = "colloquial";

		if ($DEBUG)
		{
			echo "Connecting to database ... <br>";
		}

		$sql = new mysqli($host, $user, $pass, $db);

		if ($sql->connect_error)
		{
			die("Something went wrong: " . $sql->connect_error);
		}

		if ($DEBUG)
		{
			echo "Connected to database <br>";
		}
	?>
	<?php
		function displayQry($qry, $bug=True)
		{
			if($bug)
			{
				echo "<br>Running the following SQL query:<br>";
				echo $qry;
				echo "<br>";
			}
		}
	?>
</html>
