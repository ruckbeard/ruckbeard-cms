<?php
require_once('functions.inc');
$User = new User;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
	if ($mysqli->connect_errno)
	{
		error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
	}
	
	$userId = $mysqli->real_escape_string($_POST['userId']);
	$postId = $mysqli->real_escape_string($_POST['postId']);
	
	$query = "DELETE FROM blog_likes WHERE userId = '$userId' AND postId = '$postId'";
	if ($mysqli->query($query))
	{
		$id = $mysqli->insert_id;
			error_log("Unliked post {$postId}");
		} else {
			error_log("Problem inserting {$query}");
	}	
}
else
{
	die(header("Location: ". $baseUrl));	
}
?>