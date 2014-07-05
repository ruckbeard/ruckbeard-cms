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
else
{
	$page = 0;	
}

$startat = $page * $perpage;

$login = $Blog->loginForm($User->isLoggedIn, curPageURL(), $baseUrl);

//$blogSectionTitles = $BlogAdmin->sectionTitles();
$tagTable = $BlogAdmin->tagDisplay($startat, $perpage, $baseUrl); 
$lynx = $BlogAdmin->adminTagsLynx($perpage, $page, $baseUrl);

// Assign values to the Savant instance.
$tpl->title = $name;
$tpl->tagTable = $tagTable;
$tpl->lynx = $lynx;
$tpl->login = $login;

// Display a template using the assigned values.
$tpl->display('tagsAdmin_edit.tpl.php');
?>