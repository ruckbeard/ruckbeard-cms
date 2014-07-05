<?php

require_once '../functions.inc';
$tpl = new Savant3();
$User = new User;
$Blog = new Blog;
$BlogAdmin = new BlogAdmin;

// define variables
$name = "Blog";
$perpage = 25;
$comPost =  $login = $comForm = $postForm = $blogPosts = $blogSectionTitles = $postIdArray = $bookmark = '';

if (!$User->isLoggedIn || $User->admin != 1)
{
	die(header("Location: " . $baseUrl));	
}

// if viewing pages, define page number
if (isset($_GET['page']))
{
	$page = $_GET['page'];
}
elseif (isset($_GET['comPage']))
{
	$page = $_GET['comPage'];	
}
else
{
	$page = 0;	
}

if (isset($_GET['post']))// if viewing post table
{	
	$postId = $_GET['post'];
}
else
{
	$postId = "";
}
$startat = $page * $perpage;

$login = $Blog->loginForm($User->isLoggedIn, curPageURL(), $baseUrl);


//$blogSectionTitles = $BlogAdmin->sectionTitles();
$blogPosts = $BlogAdmin->multiPost($perpage, $baseUrl); 
$lynx = $BlogAdmin->adminPostLynx($perpage, $page, $baseUrl);	
$postForm = $BlogAdmin->editPost($postId, $baseUrl);
$newPostForm = $BlogAdmin->newPost($baseUrl);
$tagForm = $BlogAdmin->newTagsForm($baseUrl);
$commentDisplay = $BlogAdmin->commentDisplay($startat, $perpage, $baseUrl);
$adminCommentLynx = $BlogAdmin->adminCommentLynx($perpage, $page, $baseUrl);

// Assign values to the Savant instance.
$tpl->title = $name;
$tpl->blog = $blogPosts;
$tpl->lynx = $lynx;
$tpl->postForm = $postForm;
$tpl->newPostForm = $newPostForm;
$tpl->tagForm = $tagForm;
$tpl->commentDisplay = $commentDisplay;
$tpl->commentLynx = $adminCommentLynx;
$tpl->login = $login;

// Display a template using the assigned values.
$tpl->display('post_admin.tpl.php');
?>