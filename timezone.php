<?php
require_once('functions.inc');
$User = new User;

$timezone = $_GET['time'];
$expire=time()+60*60*24*30;
setcookie("timezone", $timezone, $expire);
?>