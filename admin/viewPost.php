<?php
require_once("../functions.inc");
$Blog = new Blog;
$User = new User;

$postId = $_POST['postId'];

$blogPost = $Blog->singlePost($postId, $baseUrl, $User->isLoggedIn, $User->id);

echo $blogPost;
?>