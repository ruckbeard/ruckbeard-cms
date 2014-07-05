<?php
//required
require_once('functions.inc');

$tpl = new Savant3();
$User = new User;

$message = $login = "";
$email = $password = "";
$emailErr =  $passErr = "";
$name = "Log In";

if ($User->isLoggedIn)
{
	die(header("Location: books.php"));	
}

if (isset($_SESSION['error']) && isset($_SESSION['formAttempt']))
{
	unset($_SESSION['formAttempt']);
	
	if (isset($_SESSION['error'][0]))
		$emailErr = $_SESSION['error'][0];
		
	if (isset($_SESSION['error'][1]))
		$emailErr = $_SESSION['error'][1];
		
	if (isset($_SESSION['error'][2]))
		$passErr = $_SESSION['error'][2];
		
	if (isset($_SESSION['error'][3]))
			$emailErr = $_SESSION['error'][3];
}

//generage login form
$login .= " <form id='login' action='login_request.php' method='post'>\n";
$login .= "		<p id='loginTitle'>Log In</p>";
$login .= "		<input id='username' type='text' name='email' placeholder='Username'><span class='error'>".$emailErr."</span>";
$login .= "		<input id='pass' type='password'' name='password' placeholder='Password'><span class='error'>".$passErr."</span>";
$login .= "		<input id='lSubmit' type='submit' value='Submit'>\n";
$login .= " </form>";

$message .= "<span style='display:block; background-color:#444; color:#FFF; width:100%; padding-left:5px;'>Success!</span>";
$message .= "Thank you for registering.<br />";
$message .= "Click <a href='login.php'>here</a> to log in.";

$tpl->name = $name;
$tpl->message = $message;
$tpl->login = $login;

$tpl->display('login.tpl.php');
?>