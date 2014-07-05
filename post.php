<?php
require_once('functions.inc');
$tpl = new Savant3();
$Blog = new Blog;
$User = new User;

$name = "Write A New Blog Post";
$postForm = $login = $titleErr = $option = "";

if (isset($_SESSION['error']) && isset($_SESSION['formAttempt']))
{
	unset($_SESSION['formAttempt']);
	
	if (isset($_SESSION['error'][0]))
		$titleErr = $_SESSION['error'][0];
}

$login = $Blog->loginForm($User->isLoggedIn, curPageURL(), $baseUrl);

$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
if ($mysqli->connect_errno)
{
	error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
	return false;
}
$query = "SELECT * FROM tags";
if (!$result = $mysqli->query($query))
{
	error_log("Cannot retrive tags");
}
while($row = $result->fetch_assoc())
{
	$tag = $row['tag'];
	$tagId = $row['id'];
	$option .= "<option value='$tagId'>$tag</option>";
}

$postForm = 
"<form id='post' action='blogPost.php' method='post'>
<p class='error'>".$titleErr."</p>
<p>Title: </p><input id='post' type='text' name='title'>
<p>Post: </p><textarea name='post'></textarea>
<select id='tags'>
<option>Select a tag</option>
$option
</select>
<span id='tagArea' style='display:block;'></span>
<input id='commentSubmit' type='submit' value='Submit'>
</form>";

$tpl->name = $name;
$tpl->postForm = $postForm;
$tpl->login = $login;

$tpl->display('post.tpl.php');
?>