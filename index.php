<?php
require_once 'functions.inc'; //necessary includes
$tpl = new Savant3(); // templating system
$Blog = new Blog; // blog post class
$User = new User;

// define variables
$name = "Blog"; // page title
$perpage = 5; // posts per page
$login = $comPost = $comForm = $postIdArray = $bookmark = $archiveText = $emailErr = $passErr = ""; // empty vars

// get the page the user is viewing
if (isset($_GET['page']))
{
	$page = htmlspecialchars($_GET['page']);
} else
{
	$page = 0;
}
// get the month and year the user is viewing
if (isset($_GET['year']) && isset($_GET['month']) && isset($_GET['tag']))
{
	$year = htmlspecialchars($_GET['year']);
	$month = htmlspecialchars($_GET['month']);	
	$tag = htmlspecialchars($_GET['tag']);
}
elseif (isset($_GET['year']) && !isset($_GET['month']) && isset($_GET['tag']))
{
	$year = htmlspecialchars($_GET['year']);
	$tag = htmlspecialchars($_GET['tag']);	
	$month = "";
}
elseif (isset($_GET['year']) && isset($_GET['month']) && !isset($_GET['tag']))
{
	$year = htmlspecialchars($_GET['year']);	
	$month = htmlspecialchars($_GET['month']);
	$tag = "";
}
elseif (isset($_GET['year']) && !isset($_GET['month']) && !isset($_GET['tag']))
{
	$year = htmlspecialchars($_GET['year']);	
	$month = "";
	$tag = "";
}
elseif (!isset($_GET['year']) && !isset($_GET['month']) && isset($_GET['tag']))
{
	$year = "";	
	$month = "";
	$tag = htmlspecialchars($_GET['tag']);
}
else
{
	$year = "";
	$month = "";	
	$tag = "";
}

// where to start in mysql query
$startat = $page * $perpage;

//generate login form
$login = $Blog->loginForm($User->isLoggedIn, curPageURL(), $baseUrl);

//generate the share bar
$bookmark = 
"<!-- AddToAny BEGIN -->
<a class=\"a2a_dd\" href=\"http://www.addtoany.com/share_save\"><img src=\"http://static.addtoany.com/buttons/share_save_171_16.png\" width=\"171\" height=\"16\" border=\"0\" alt=\"Share\"/></a>
<script type=\"text/javascript\" src=\"//static.addtoany.com/menu/page.js\"></script>
<!-- AddToAny END -->";

//generate blog posts
$blogPosts = $Blog->multiPost($startat, $perpage, $baseUrl, $User->isLoggedIn, $User->id, $year, $month, $tag);
//generate page links
$lynx = $Blog->multiPostLynx($perpage, $page, $baseUrl, $year, $month, $tag);
//get current url and redirect if at index.php
if (curPageURL() == $baseUrl . "index.php")
	header("Location: " . $baseUrl);


// Assign values to the Savant instance.
$tpl->title = $name; // page title
$tpl->blog = $blogPosts; // blog posts that were generated
$tpl->lynx = $lynx; // page links
$tpl->login = $login; // login form
$tpl->share = $bookmark; // share bar
$tpl->archive = $Blog->archiveText(); // archive links

// Display a template using the assigned values.
$tpl->display('index.tpl.php');
?>