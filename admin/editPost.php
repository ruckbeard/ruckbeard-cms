<?php
require_once("../functions.inc");
$BlogAdmin = new BlogAdmin;
$User = new User;

$postId = $_POST['postId'];

$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
if ($mysqli->connect_errno)
{
	error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
	return false;
}
// select the blog post the user is viewing 
$query = "SELECT * FROM blog WHERE id = '{$postId}'";
if (!$result = $mysqli->query($query))
{
	error_log("Cannot retrieve blog post");
	return false;
}

//retrieve the blog post
$row = $result->fetch_assoc();
$post = $row['post'];
$preview = $row['preview'];
//count characters of post and preview
if ($post != $preview)
{
	$countPost = strlen($post);
	$countPreview = strlen($preview);
	//cut preview out of the post
	$post = substr($post, $countPreview, $countPost);
	//turn post into array to be imploded
	$postEdit = array();
	$postEdit[0] = $preview;	
	$postEdit[1] = $post;
	//insert preview tag by imploding the preview and post
	$post = implode("<p>&lt;!-- preview --&gt;</p>", $postEdit);
}

echo $post;
?>