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
	if (isset($_POST['postId']))
	{
		$postId = $mysqli->real_escape_string($_POST['postId']);
		
		$query = "SELECT * FROM blog WHERE id = $postId";
		if (!$result = $mysqli->query($query))
		{
			error_log("Could not get post $postId");
		}
		$row = $result->fetch_assoc();
		$fname = $row['fname'];
		$dateExplode = explode("-", $row['date']);
		$year = $dateExplode[0];
		$month = $dateExplode[1];
		$html_file_name_1 = $fname.".html";
		$html_file_name_2 = $fname.".tpl.html";
		chdir("..");
		if (is_dir($year))
			chdir($year);
		if (is_dir($month))
			chdir($month);
		if(is_readable($html_file_name_1))
			unlink($html_file_name_1);
		if(is_readable($html_file_name_2))
			unlink($html_file_name_2);
			
		$query = "DELETE FROM blog WHERE id = $postId";
		if ($mysqli->query($query))
		{
			error_log("Deleted {$postId}");
		} else {
			error_log("Problem deleting {$query}");
		}
		
		$query = "DELETE FROM post_tags WHERE postId = $postId";
		if ($mysqli->query($query))
		{
			error_log("Deleted {$tagId}");
		} else {
			error_log("Problem deleting {$query}");
		}
		
		$query = "DELETE FROM likes WHERE postId = $postId";
		if ($mysqli->query($query))
		{
			error_log("Deleted {$tagId}");
		} else {
			error_log("Problem deleting {$query}");
		}
		
		$query = "DELETE FROM comments WHERE postId = $postId";
		if ($mysqli->query($query))
		{
			error_log("Deleted {$tagId}");
		} else {
			error_log("Problem deleting {$query}");
		}
	}
	elseif (isset($_POST['tagId']))
	{
		$tagId = $mysqli->real_escape_string($_POST['tagId']);
		$query = "DELETE FROM tags WHERE id = $tagId";
		if ($mysqli->query($query))
		{
			error_log("Deleted {$tagId}");
		} else {
			error_log("Problem deleting {$query}");
		}
		
		$query = "DELETE FROM post_tags WHERE tagId = $tagId";
		if ($mysqli->query($query))
		{
			error_log("Deleted {$tagId}");
		} else {
			error_log("Problem deleting {$query}");
		}
	}
	elseif (isset($_POST['comId']))
	{
		$comId = $mysqli->real_escape_string($_POST['comId']);
		$query = "DELETE FROM comments WHERE id = $comId";
		if ($mysqli->query($query))
		{
			error_log("Deleted {$comId}");
		} else {
			error_log("Problem deleting {$query}");
		}
	}
}
?>