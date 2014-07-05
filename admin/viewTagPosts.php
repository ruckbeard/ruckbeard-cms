<?php
require_once("../functions.inc");
$Blog = new Blog;
$User = new User;

$tagId = $_POST['tagId'];

$blogPost = $Blog->multiPost(0, 999999, $baseUrl, $User->isLoggedIn, $User->id, "", "", $tagId);

if(!$blogPost)
	$blogPost = '<p id="noPosts">There are no posts to display.</p>';

echo $blogPost;
?>