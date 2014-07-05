<?php
require_once("../functions.inc");
$Blog = new Blog;
$User = new User;

$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
if ($mysqli->connect_errno)
{
	error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
	return false;
}

$comId = $_POST['comId'];

$comPost = "";
		
//configure html purifier for comments
$config = HTMLPurifier_Config::createDefault();
$config->set('HTML.AllowedElements', array('a','b','p','i','em','u', 'br', 'div', 'img', 'strong'));
$config->set('HTML.AllowedAttributes', array('a.href', 'img.src', '*.alt', '*.title', '*.border', 'a.target', 'a.rel'));
$purifier = new HTMLPurifier($config);
		
//connect to database
$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
if ($mysqli->connect_errno){
error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
return false;}
// select comments on blog post based on post id
$query = "SELECT * FROM comments WHERE id = $comId";
if (!$result = $mysqli->query($query)){
	error_log("Cannot retrieve comments");
	return false;}
// generate comment array		
$row = $result->fetch_assoc();
$postId = $row['postId'];
$cDate = strtotime($row['time']); //date comment posted on
$dateAgo = ago($cDate);
$comment = $row['comment']; //comment text
$name = $row['name'];
if (!empty($row['email'])){
	$email = $row['email'];
	$title = 
"<a href='mailto:".$email."'>".$name."</a>";
}else{
	$title = $name;	}
			
// select the blog post the user is viewing 
$query2 = "SELECT * FROM blog WHERE id = $postId";
if (!$result2 = $mysqli->query($query2)){
	error_log("Cannot retrieve blog post");
	return false;}
	
//fetch date to create link
$row2 = $result2->fetch_assoc();
$date = strtotime($row2['date']); //date posted on
$fname = $row2['fname'];
$dateExplode = explode("-", $row2['date']);
$year = $dateExplode[0];
$month = $dateExplode[1];
//create link
$path = $year."/".$month."/".$fname.".html";
		
//comment regex
$comment = preg_replace("/^((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/", "<a href='$1'>$1</a>",$comment); // url at beginning of post
$comment = preg_replace("/ ((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/", "<a href='$1'> $1</a>",$comment); // url after space
$comment = preg_replace("/\n((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/", "<a href='$1'> $1</a>",$comment); // url after new line
$comment = preg_replace("/\[b\](.+)\[\/b\]|\[B\](.+)\[\/B\]/iUs", "<b>$1</b>", $comment); // bold bbcode
$comment = preg_replace("/\[url=((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)\](.+)\[\/url\]/", "<a href='$1'>$5</a>", $comment); // url bbcode
$comment = preg_replace("/\[i\](.+)\[\/i\]|\[I\](.+)\[\/I\]/iUs","<i>$1</i>",$comment); //italics bbcode 
$comment = nl2br($comment, true); // change /n to <br />
$comment = $purifier->purify($comment); // purify html codes from comment
//add if post is not empty, display post
if ($comment != ""){
	//generate comment array
	$comPost = 
"<div class='commentPost' id='".$comId."'>
<span class='commentTitle'>".$title." said:	</span>
<span class='commentDate'><a href='".$baseUrl. $path ."#".$comId."'>" . /*date('F d, Y', $cDate) . " at " . date('h:i A', $cDate)*/ $dateAgo . "</a></span>
<p>".$comment."</p>
</div>";} 

function ago($time){
$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
$lengths = array("60","60","24","7","4.35","12","10");
	
$now = time() - $_COOKIE['timezone'] * 60 * 60;
	
	$difference     = $now - $time;
	$tense         = "ago";

for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
			$difference /= $lengths[$j];
}
	
$difference = round($difference);
	
if($difference != 1) {
	$periods[$j].= "s";
}
	
return "$difference $periods[$j] ago ";
}

echo $comPost;
?>