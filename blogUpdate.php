<?php
require_once('functions.inc');


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
	if ($mysqli->connect_errno)
	{
		error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
					return false;
	}

	$postId = $mysqli->real_escape_string($_GET['postId']);
	$title = $mysqli->real_escape_string($_POST['title']);
	$post = $mysqli->real_escape_string($_POST['post']);
	
	$post = explode("<p>&lt;!-- preview --&gt;</p>",$post);
	$preview = $post[0];
	$post = implode(" ", $post);
	
	$query = "UPDATE blog SET title ='{$title}', preview ='{$preview}', post ='{$post}' WHERE id = $postId";
	if ($mysqli->query($query))
			{
				$id = $mysqli->insert_id;
				error_log("Inserted {$insertComment} into post ID {$postId}");
			} else {
				error_log("Problem inserting {$query}");
			}
	die(header("Location: admin/post_admin.php"));
}
?>