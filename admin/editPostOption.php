<?php
require_once('../functions.inc');
$postId = $_POST['postId'];
if(isset($_POST['tagId']))
{
	$removeTagId = $_POST['tagId'];
	$option = '';
}
else
{
	$option = '<option>Select a tag</option>';	
}
$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
if ($mysqli->connect_errno)
{
	error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
	return false;
}
$query = "SELECT id FROM tags";
if (!$result = $mysqli->query($query))
{
	error_log("Cannot retrive tags");
}
while($row = $result->fetch_assoc())
{
	$tag[] = $row['id'];
}

$query2 = "SELECT tagId FROM post_tags WHERE postId = {$postId}";
if (!$result2 = $mysqli->query($query2))
{
	error_log("Cannot retrive tags");
}
while($row2 = $result2->fetch_assoc())
{
	$tagId[] = $row2['tagId'];
}

if(isset($tagId))
{
	$tagsDiff = array_diff($tag,$tagId);
	if (isset($removeTagId))
		array_push($tagsDiff, $removeTagId);

	foreach($tagsDiff as $key=>$val)
	{
		$query3 = "SELECT * FROM tags WHERE id = {$val}";	
		if (!$result3 = $mysqli->query($query3))
		{
			error_log("Cannot retrive tags");
		}
		$row3 = $result3->fetch_assoc();
		$id = $row3['id'];
		$text = $row3['tag'];
		$option .= 
"<option value='".$id."'>".$text."</option>";
	}
	
}

echo $option;
?>