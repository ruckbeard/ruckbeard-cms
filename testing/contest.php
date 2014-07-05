<?php
require_once('../functions.inc');
$User = new User;
$x = $_POST['test'];

if ($x == "user")
	echo $User->name;
	
if ($x == "email")
	echo $User->email;
?>