<?php
require_once('functions.inc');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$_SESSION['formAttempt'] = true;
	if (isset($_SESSION['error'])) {
	unset($_SESSION['error']);
	}
	$_SESSION['error'] = array();
	
	if (empty($_POST["email"]))
		{
			$_SESSION['error'][0] = "Email is required.";
			$errors = true;
		}
	else
		{
			$email = test_input($_POST["email"]);
			if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$_SESSION['error'][1] = "Invalid email format";
				$errors = true;
			}
					
			$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
			if ($mysqli->connect_errno)
			{
				error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
					return false;
			}
			//check for existing user
			$findUser = "SELECT id from player where email = '{$email}'";
			$findResult = $mysqli->query($findUser);
			$findRow = $findResult->fetch_assoc();
			if (isset($findRow['id']) && $findRow['id'] !="")
			{
				$_SESSION['error'][2] = "A user with that email already exists.";
				$errors = true;
			}
		}
			
	if (empty($_POST["pass"]))
		{
			$_SESSION['error'][3] = "Password is required.";
			$errors = true;
			}
	else
		{
			$password = test_input($_POST["pass"]);
			if (!preg_match("/^[a-zA-Z0-9\!\@\#\$\%\^\*\(\)\[\]\_\-\+\=]+$/",$password))
			{
				$_SESSION['error'][4] = "Password must only be letters, numbers or special characters.";
				$errors = true;
			}
		}
			
	if (empty($_POST["verifypass"]))
		{
			$_SESSION['error'][5] = "You must verify the password.";
			$errors = true;	
		}
	else
		{
			$verPass = test_input($_POST["verifypass"]);
			if ($verPass != $password)
			{
				$_SESSION['error'][6] = "Does not match password.";
				$errors = true;
			}
		}
				
	if (empty($_POST["firstname"]))
		{
			$_SESSION['error'][7] = "First name is required.";
			$errors = true;
		}
	else
		{
			$firstName = test_input($_POST["firstname"]);
			if (!preg_match("/^[a-zA-Z]+$/",$firstName))
			{
				$_SESSION['error'][8] = "Name must consist of letters only.";
				$errors = true;	
			}
		}
				
	if (empty($_POST["lastname"]))
		{
			$_SESSION['error'][9] = "Last name is required.";
			$errors = true;
		}
	else
		{
			$lastName = test_input($_POST["lastname"]);
			if (!preg_match("/^[a-zA-Z]+$/",$lastName))
			{
				$_SESSION['error'][10] = "Last name must consist of letters only.";
				$errors = true;	
			}
		}	
}
		
function registerUser($userData)
{
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
	if ($mysqli->connect_errno)
	{
		error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
			return false;
	}
	$email = $mysqli->real_escape_string($_POST["email"]);
	$cryptedPassword = crypt($_POST['pass']);
	$password = $mysqli->real_escape_string($cryptedPassword);
	$firstName = $mysqli->real_escape_string($_POST['firstname']);
	$lastName = $mysqli->real_escape_string($_POST['lastname']);
			
	$query = "INSERT INTO player (email,create_date,password,last_name,first_name) " .
		" VALUES ('{$email}',NOW(),'{$password}','{$lastName}','{$firstName}')";
	if ($mysqli->query($query))
	{
		$id = $mysqli->insert_id;
		error_log("Inserted {$query} as ID {$id}");
		return true;
	} else {
		error_log("Problem inserting {$query}");
	}
}
		
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (count($_SESSION['error']) == 0 && $_SERVER["REQUEST_METHOD"] == "POST")
{
	if (registerUser($_POST))
	{
		die(header("Location: success.php"));
	} else {
		die(header("Location: registration.php"));	
	}
} 
else 
{
	die(header("Location: registration.php"));	
}
?>