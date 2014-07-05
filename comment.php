<?php
require_once('functions.inc');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$_SESSION['formAttempt'] = true;
	if (isset($_SESSION['error'])) {
	unset($_SESSION['error']);
	}
	$_SESSION['error'] = array();
	
	if (empty($_POST["commentName"]))
		{
			$_SESSION['error'][0] = "Name is required.";
		}
	else
		{
			$name = test_input($_POST["commentName"]);
			if (!preg_match("/^[a-zA-Z0-9_]+$/",$name))
			{
				$_SESSION['error'][1] = "Name must consist of letters, numbers, and underscore only.";
			}
		}
		
	if (!empty($_POST["commentEmail"]))
		{	
			$email = test_input($_POST["commentEmail"]);
			if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$_SESSION['error'][2] = "Invalid email format";
			}
		}
	else
		{
			$email = '';	
		}
	
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
	if ($mysqli->connect_errno)
	{
		error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
		return false;
	}
	
	$redirect = NULL;
	if($_POST['location'] != '') {
    	$redirect = $_POST['location'];
	}
	
	
	

	if (count($_SESSION['error']) == 0 && $_SERVER["REQUEST_METHOD"] == "POST")
	{	
		//configure html purifier for comments
		$config = HTMLPurifier_Config::createDefault();
		$config->set('HTML.AllowedElements', array('a','b','p','i','em','u', 'br', 'div', 'img', 'strong'));
		$config->set('HTML.AllowedAttributes', array('a.href', 'img.src', '*.alt', '*.title', '*.border', 'a.target', 'a.rel'));
		$purifier = new HTMLPurifier($config);
		
		$postId = $mysqli->real_escape_string($_GET['post']);
		$comment = $mysqli->real_escape_string($_POST['comment']);
		$name = $mysqli->real_escape_string($_POST['commentName']);
		if (!empty($_POST['commentEmail']))
		{
			$email = $mysqli->real_escape_string($_POST['commentEmail']);
		}
	
		$comment = $purifier->purify($comment);
	
		if ($comment != "")
		{
			$query = "INSERT INTO comments (postId,comment,name,email) VALUES ('{$postId}','{$comment}','{$name}','{$email}')";
			if ($mysqli->query($query))
				{
					$id = $mysqli->insert_id;
					error_log("Inserted {$comment} into post ID {$postId}");
				} else {
					error_log("Problem inserting {$query}");
				}
		}
		die(header("Location: ". $redirect));
	}
	else
	{
		die(header("Location: ". $redirect));
	}	
}

function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}		
?>