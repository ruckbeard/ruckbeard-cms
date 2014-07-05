<?php
require_once('functions.inc');
$User = new User;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$_SESSION['formAttempt'] = true;
	if (isset($_SESSION['error'])) {
	unset($_SESSION['error']);
	}
	$_SESSION['error'] = array();
	
	$redirect = NULL;
	if($_POST['location'] != '') {
    	$redirect = $_POST['location'];
	}
	
	if (empty($_POST["email"]))
		{
			$_SESSION['error'][0] = "Email is required.";
			$errors = true;
		}
	else
		{
			$email = $_POST["email"];
			if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$_SESSION['error'][1] = "Invalid email format";
				$errors = true;
			}	
		}
	
	if (empty($_POST["password"]))
		{
			$_SESSION['error'][2] = "Password is required.";
			$errors = true;
		}
	
	if (count($_SESSION['error']) == 0 && $_SERVER["REQUEST_METHOD"] == "POST")
	{
		if ($User->authenticate($_POST['email'], $_POST['password']))
		{
			if ($redirect == NULL)
			{
				die(header("Location: index.php"));
			}
			else
			{
				die(header("Location: ". $redirect));
			}
		}
		else
		{
			if ($redirect == NULL)
			{
				$_SESSION['error'][3] = "There was a problem with your username or password.";
				die(header("Location: login.php"));
			}
			else
			{
				$_SESSION['error'][3] = "There was a problem with your username or password.";
				die(header("Location: ". $redirect));
			}
		}
	}
	else
	{
		if ($redirect == NULL)
		{
			die(header("Location: login.php"));
		}
		else
		{
			die(header("Location: ". $redirect));
		}
	}

}
else
{
	die(header("Location: login.php"));	
}
?>