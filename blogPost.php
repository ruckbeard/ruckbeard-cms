<?php
require_once('functions.inc');


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$_SESSION['formAttempt'] = true;
	if (isset($_SESSION['error'])) {
	unset($_SESSION['error']);
	}
	$_SESSION['error'] = array();
	
	$tpl_file = "singlePost_template.html";
	$tpl_template_file = "singlePost_template.tpl.html";
	
	$tpl_path = "templates/";
	
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
	if ($mysqli->connect_errno)
	{
		error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
					return false;
	}

	
	$title = $mysqli->real_escape_string($_POST['title']);
	$post = $mysqli->real_escape_string($_POST['post']);
	$tag = $_POST['tag'];
	
	$post = explode("<p>&lt;!-- preview --&gt;</p>",$post);
	$preview = $post[0];
	$post = implode(" ", $post);
	
	//Lower case everything
    $fname = strtolower($title);
    //Make alphanumeric (removes all other characters)
    $fname = preg_replace("/[^a-z0-9_\s-]/", "", $fname);
    //Clean up multiple dashes or whitespaces
    $fname = preg_replace("/[\s-]+/", " ", $fname);
    //Convert whitespaces and underscore to dash
    $fname = preg_replace("/[\s_]/", "-", $fname);
	
	$findPost = "SELECT id from blog where fname = '{$fname}'";
	$findResult = $mysqli->query($findPost);
	$findRow = $findResult->fetch_assoc();
	if (isset($findRow['id']) && $findRow['id'] !="")
	{
		$_SESSION['error'][0] = "A post with that title exists.";
		
	}
	
	
	if (count($_SESSION['error']) == 0)
	{
		chdir("..");
	
		$query = "INSERT INTO blog (title,preview,post,fname) VALUES ('{$title}','{$preview}','{$post}','{$fname}')";
		if ($mysqli->query($query))
		{
			$id = $mysqli->insert_id;
			error_log("Inserted {$query} into post ID {$id}");
		} else {
			error_log("Problem inserting {$query}");
		}
	
		$data['fname'] = $fname;
		$data['title'] = "\"".$title."\";";
		$data['id'] = "\"".$id."\";";
	
		$placeholders = array("{fname}", "{title}", "{id}");
		
		$tpl_1 = file_get_contents($tpl_path.$tpl_file);
		$tpl_2 = file_get_contents($tpl_path.$tpl_template_file);
	
		$new_blog_file = str_replace($placeholders, $data, $tpl_1);
	
		$html_file_name_1 = $fname.".html";
		$html_file_name_2 = $fname.".tpl.html";
	
		$query = "SELECT date FROM blog WHERE id = '{$id}'";
		if (!$result = $mysqli->query($query))
		{
			error_log("Failed to get date from {$id}");
		}
		$row = $result->fetch_assoc();
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
		
		foreach ($tag as $key=>$val)
		{
			$tagId = $val;
			
			$queryInsert="INSERT INTO post_tags (tagId,postId) VALUES ('{$tagId}','{$id}')";	
			if($mysqli->query($queryInsert))
			{
				error_log("inserted {$tagId} into {$id}");	
			}
			else
			{
				error_log("Could not insert {$tagId} into {$id}");	
			}
		}
    
		die(header("Location: ".$baseUrl."post.php"));
	}
	else
	{
		die(header("Location: post.php"));
	}
}
else
{
		die(header("Location: post.php"));
}
?>