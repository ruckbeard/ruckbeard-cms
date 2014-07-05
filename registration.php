<?php
//required
require_once('functions.inc');

$tpl = new Savant3();
$User = new User;

//define variables and set them to empty values
$email = $password = $verPass = $firstName = $lastName = "";
$emailErr = $passErr = $verErr = $fnameErr = $lnameErr = "";
$regForm = $login = "";
$errors = false;
$name = "Registration";

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
		$emailErr = $_SESSION['error'][2];
		
	if (isset($_SESSION['error'][3]))
		$passErr = $_SESSION['error'][3];
		
	if (isset($_SESSION['error'][4]))
		$passErr = $_SESSION['error'][4];
		
	if (isset($_SESSION['error'][5]))
		$verErr = $_SESSION['error'][5];
		
	if (isset($_SESSION['error'][6]))
		$verErr = $_SESSION['error'][6];
		
	if (isset($_SESSION['error'][7]))
		$fnameErr = $_SESSION['error'][7];
		
	if (isset($_SESSION['error'][8]))
		$fnameErr = $_SESSION['error'][8];
		
	if (isset($_SESSION['error'][9]))
		$lnameErr = $_SESSION['error'][9];
		
	if (isset($_SESSION['error'][10]))
		$lnameErr = $_SESSION['error'][10];
}


$regForm .= "<div id='regFormDiv'>";
$regForm .= "<p id='regTitle'>Registration</p>";
$regForm .= "<p class='error'>* Required field.</p>";
$regForm .= "<form id='regForm' method='post' action='registration_attempt.php'>";
$regForm .= "	<span style='display:-webkit-inline-box;width:100%;'><input id='regInput' type='text' name='email' placeholder='Email' /><span class='error'>* ".$emailErr."</span></span>";
$regForm .= "	<span style='display:-webkit-inline-box;width:100%;'><input id='regInput' type='password' name='pass' placeholder='Password' /><span class='error'>* ".$passErr."</span></span>";
$regForm .= "	<span style='display:-webkit-inline-box;width:100%;'><input id='regInput' type='password' name='verifypass' placeholder='Confirm Password' /><span class='error'>* ".$verErr."</span></span>";
$regForm .= "	<span style='display:-webkit-inline-box;width:100%;'><input id='regInput' type='text' name='firstname' placeholder='First Name' /><span class='error'>* ".$fnameErr."</span></span>";
$regForm .= "	<span style='display:-webkit-inline-box;width:100%;'><input id='regInput' type='text' name='lastname' placeholder='Last Name' /><span class='error'>* ".$lnameErr."</span></span>";
$regForm .= "	<input id='regButton' type ='submit' value='Submit'>";
$regForm .= "</form>";
$regForm .= "</div>";

//generage login form
$login .= " <form id='login' action='loginRequest.php' method='post'>\n";
$login .= "		<p id='loginTitle'>Log In</p>";
$login .= "		<input id='username' type='text' name='email' placeholder='Username'>";
$login .= "		<input id='pass' type='password'' name='password' placeholder='Password'>\n";
$login .= "		<input id='lSubmit' type='submit' value='Submit'>\n";
$login .= " </form>";

$tpl->name = $name;
$tpl->regForm = $regForm;
$tpl->login = $login;

$tpl->display('registration.tpl.php');
?>