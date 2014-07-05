<?php
//required
require_once('functions.inc');

$tpl = new Savant3();
$User = new User;

if ($User->isLoggedIn)
{
	die(header("Location: books.php"));	
}

$message = $login = "";

$name = "Success";

//generage login form
$login .= " <form id='login' action='loginRequest.php' method='post'>\n";
$login .= "		<p id='loginTitle'>Log In</p>";
$login .= "		<input id='username' type='text' name='email' placeholder='Username'>";
$login .= "		<input id='pass' type='password'' name='password' placeholder='Password'>\n";
$login .= "		<input id='lSubmit' type='submit' value='Submit'>\n";
$login .= " </form>";

$message .= "<span style='display:block; background-color:#444; color:#FFF; width:100%; padding-left:5px;'>Success!</span>";
$message .= "Thank you for registering.<br />";
$message .= "Click <a href='login.php'>here</a> to log in.";

$tpl->name = $name;
$tpl->message = $message;
$tpl->login = $login;

$tpl->display('success.tpl.php');
?>