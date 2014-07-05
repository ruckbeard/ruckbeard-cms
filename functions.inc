<?php
//generic file for generic functions and other includes
session_start();
require_once("dbstuff.inc");
require_once("ClassUser.php");
require_once("BlogClass.php");
require_once("/admin/BlogAdminClass.php");
require_once('/htmlpurifier/library/HTMLPurifier.auto.php');
require_once('Savant3.php');

$baseUrl = "http://127.0.0.1/ruckbeard/";

function curPageURL() {
 $pageURL = 'http';
 //if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

session_set_cookie_params (600);
?>