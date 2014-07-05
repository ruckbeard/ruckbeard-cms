<?php
require_once('../functions.inc');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
	if ($mysqli->connect_errno)
	{
		error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
	}
	
	$tags = $_POST['tag'];
	foreach ($tags as $key => $val)
	{
		$val = $mysqli->real_escape_string($val);
		$val = trim($val);
		$val = htmlspecialchars($val);
		
		if ($val != "")
		{
			$query = "INSERT INTO tags (tag) VALUES ('{$val}')";
			if ($mysqli->query($query))
			{
				error_log("Created tag {$val}");
			} else {
				error_log("Problem with query {$query}");
			}
		}
	}
	
	die(header("Location: post_admin.php"));
}else{
	die(header("Location: post_admin.php"));
}
?>