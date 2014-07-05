<?php
require_once("../functions.inc");
$x = $tags = $tagIdArray = '';
if(isset($_POST['postId']))
	$postId = $_POST['postId'];

if(isset($_POST['addTagText']))
	$addTagText = htmlspecialchars($_POST['addTagText']);
else
	$addTagText = '';
	
if (isset($_POST['addTagId']))
	$addTagId = $_POST['addTagId'];
else
	$addTagId = '';

if ($addTagText == '' && $addTagId == '')
{
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
	if ($mysqli->connect_errno)
	{
		error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
		return false;
	}
	$query = "SELECT tags.tag, tags.id FROM post_tags INNER JOIN tags ON tags.id = post_tags.tagId WHERE post_tags.postId = '{$postId}'";
	if (!$result = $mysqli->query($query))
	{
		error_log("Cannot retrieve tags from Post ID $postId");	
	}
	while($row = $result->fetch_assoc())
	{
		$tagText = $row['tag'];
		$tagsId = $row['id'];
		$tags[] = 
"<span class='tag'>".$tagText."&nbsp;<span class='$tagsId' id='".$tagText."'><span id='closeIcon' class='ui-icon ui-icon-circle-close' style='display: inline-block;cursor:pointer;'></span></span></span>";
		$tagIdArray[] = 
"<input id='tag".$tagsId."' type='hidden' name='tagUpdate[]' value='".$tagsId."'>";
	}
}
else
{
	$tags[] = 
"<span class='tag'>".$addTagText."&nbsp;<span class='".$addTagId."' id='".$addTagText."'><span id='closeIcon' class='ui-icon ui-icon-circle-close' style='display: inline-block;cursor:pointer;'></span></span></span>";
	$tagIdArray[] = 
"<input id='tag".$addTagId."' type='hidden' name='tagUpdate[]' value='".$addTagId."'>";
}
if ($tags != "")
{
	foreach($tags as $key=>$val)
	{
		$x .= $val."<!++separator++>";
	}
}
if ($tagIdArray != "")
{
	foreach($tagIdArray as $key=>$val)
	{
		if ($key!=count($tags))
			$x .= $val."<!++separator++>";
		else
			$x .= $val;
	}
}
echo $x;
?>