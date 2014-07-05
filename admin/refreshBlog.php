<?php
require_once('../functions.inc');
$User = new User;

if ($User->isLoggedIn && $User->admin == 1)
{
	$tpl_file = "singlePost_template.html";
	$tpl_template_file = "singlePost_template.tpl.html";
	
	$tpl_path = "templates/";
	
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
	if ($mysqli->connect_errno)
	{
		error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
					return false;
	}
	
	$queryAllId = "SELECT id FROM blog";
	if (!$result = $mysqli->query($queryAllId))
	{
		error_log("Failed to id's from blog");
	}
	while($row = $result->fetch_assoc())
	{
		$allId[] = $row['id'];	
	}
	
	chdir("..");
	
	foreach ($allId as $key=>$id)
	{
		$query = "SELECT * FROM blog WHERE id = '{$id}'";
		if (!$result = $mysqli->query($query))
		{
			error_log("Failed to get contents from {$id}");
		}
		$row = $result->fetch_assoc();
		$fname = $row['fname'];
		$title = $row['title'];
	
		$data['fname'] = $fname;
		$data['title'] = "\"".$title."\";";
		$data['id'] = "\"".$id."\";";
	
		$placeholders = array("{fname}", "{title}", "{id}");
		
		$tpl_1 = file_get_contents($tpl_path.$tpl_file);
		$tpl_2 = file_get_contents($tpl_path.$tpl_template_file);
	
		$new_blog_file = str_replace($placeholders, $data, $tpl_1);
	
		$html_file_name_1 = $fname.".html";
		$html_file_name_2 = $fname.".tpl.html";
	
		$dateExplode = explode("-", $row['date']);
		$year = $dateExplode[0];
		$month = $dateExplode[1];
	
		if (!is_dir($year."/".$month))
		{
			mkdir($year);
			mkdir($year."/".$month);
		}

		$path = $year."/".$month."/";
	
		$fp = fopen($path.$html_file_name_1, "w"); 
		fwrite($fp, $new_blog_file); 
		fclose($fp);
	
		$fp_2 = fopen($path.$html_file_name_2, "w"); 
		fwrite($fp_2, $tpl_2); 
		fclose($fp_2);
	}
	
	die(header("Location: post_admin.php "));
}
else
{
		die(header("Location: ".$baseUrl));
}
?>