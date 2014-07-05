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
	$like = 1;
	
	$query = "INSERT INTO blog_likes (userId,postId,likes) VALUES ('{$userId}', '{$postId}', '{$like}')";
	if ($mysqli->query($query))
	{
		$id = $mysqli->insert_id;
			error_log("Liked post {$postId}");
		} else {
			error_log("Problem inserting {$query}");
	}
	
	$query3 = "SELECT count(likes) FROM blog_likes WHERE postId = {$postId}";
	if (!$result3 = $mysqli->query($query3))
	{
		error_log("Cannot count likes");
		return false;	
	}
	$row3 = $result3->fetch_assoc();
	if ($row3['count(likes)'] != 1)
		$likeCount = $row3['count(likes)'] . " Likes";
	elseif ($row3['count(likes)'] == 1)
		$likeCount = $row3['count(likes)'] . " Like";
	
	echo $likeCount;
}
else
{
	die(header("Location: ".$baseUrl));	
}
?>