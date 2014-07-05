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
		$postId = $_POST['postId'];
		foreach ($postId as $key => $val)
		{
			$query = "SELECT * FROM blog WHERE postId = $postId";
			if (!$result = $mysqli->query($query))
			{
				error_log("Could not get post $postid");
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
			
			$val = $mysqli->real_escape_string($val);
			$query = "DELETE FROM blog WHERE id = $val";
			if ($mysqli->query($query))
			{
				error_log("Deleted {$val}");
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
	}
	elseif(isset($_POST['tagId']))
	{
		$tagId = $_POST['tagId'];
		foreach ($tagId as $key => $val)
		{
			$val = $mysqli->real_escape_string($val);
			$query = "DELETE FROM tags WHERE id = $val";
			if ($mysqli->query($query))
			{
					error_log("Deleted {$val}");
			} else {
				error_log("Problem deleting {$query}");
			}
			
			$query = "DELETE FROM post_tags WHERE tagId = $val";
			if ($mysqli->query($query))
			{
					error_log("Deleted {$val}");
			} else {
				error_log("Problem deleting {$query}");
			}
		}
	}
	elseif(isset($_POST['comIid']))
	{
		$comId = $_POST['comId'];
		foreach ($comId as $key => $val)
		{
			$val = $mysqli->real_escape_string($val);
			$query = "DELETE FROM comments WHERE id = $val";
			if ($mysqli->query($query))
			{
					error_log("Deleted {$val}");
			} else {
				error_log("Problem deleting {$query}");
			}
		}
	}
}
?>