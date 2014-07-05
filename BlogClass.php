<?php
class Blog{
	//generate the default page blog post list
	public function multiPost($startat, $perpage, $baseUrl, $isLoggedIn, $userId, $ayear, $amonth, $tag){
		$tagLynx = $blogPosts = '';
		
		//connect to database
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno){
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
			return false;}
		
		if ($ayear == "" && $amonth == "" && $tag == ""){
			// select 5 blog posts based on page number
			$query = "SELECT * FROM blog order by id desc limit $startat, $perpage";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}elseif ($ayear != "" && $amonth == "" && $tag == ""){
			$nextYear = $ayear + 1;
			$date = $ayear ."-01-01";
			$nextDate = $nextYear ."-01-01"; 
			
			$query = "SELECT * FROM blog WHERE date BETWEEN '". $date ."' and '". $nextDate ."' ORDER BY date DESC limit $startat, $perpage";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}elseif ($ayear != "" && $amonth != "" && $tag == ""){
			$nextMonth = $amonth + 1;
			if ($nextMonth < 10)
				$nextMonth = "0" . $nextMonth;
			$date = $ayear ."-". $amonth ."-01";
			$nextDate = $ayear ."-". $nextMonth ."-01";
			if ($amonth == 12)
				$nextDate = $ayear + 1 ."-01-01";
			
			$query = "SELECT * FROM blog WHERE date BETWEEN '". $date ."' and '". $nextDate ."' ORDER BY date DESC limit $startat, $perpage";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}elseif ($ayear == "" && $amonth == "" && $tag != ""){
			
			$query = "SELECT blog.id, blog.date, blog.title, blog.preview, blog.fname FROM blog INNER JOIN post_tags ON blog.id = post_tags.postId WHERE tagId = $tag ORDER BY blog.id DESC limit $startat, $perpage";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}elseif ($ayear != "" && $amonth == "" && $tag != ""){
			$nextYear = $ayear + 1;
			$date = $ayear ."-01-01";
			$nextDate = $nextYear ."-01-01"; 
			
			$query = "SELECT blog.id, blog.date, blog.title, blog.preview, blog.fname FROM blog INNER JOIN post_tags ON blog.id = post_tags.postId WHERE date BETWEEN '". $date ."' and '". $nextDate ."' AND post_tags.tagId = ".$tag." ORDER BY date DESC limit $startat, $perpage";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}elseif ($ayear != "" && $amonth != "" && $tag != ""){
			$nextMonth = $amonth + 1;
			if ($nextMonth < 10)
				$nextMonth = "0" . $nextMonth;	
			$date = $ayear ."-". $amonth ."-01";
			$nextDate = $ayear ."-". $nextMonth ."-01";
			if ($amonth == 12)
				$nextDate = $ayear + 1 ."-01-01";	
			
			$query = "SELECT blog.id, blog.date, blog.title, blog.preview, blog.fname FROM blog INNER JOIN post_tags ON blog.id = post_tags.postId WHERE date BETWEEN '". $date ."' and '". $nextDate ."' AND post_tags.tagId = ".$tag." ORDER BY date DESC limit $startat, $perpage";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}	
		}
		
		//generate array of blog posts
		while($row = $result->fetch_assoc()){
			$postId = $row['id']; //id of post
			$title = $row['title']; // title of blog post
			$date = strtotime($row['date']); // date when posted
			$post = $row['preview']; // short preview of post
			$fname = $row['fname'];
			$dateExplode = explode("-", $row['date']);
			$year = $dateExplode[0];
			$month = $dateExplode[1];
			$path = $year."/".$month."/".$fname.".html";
			
			//count comments on post
			$query2 = "SELECT count(id) FROM comments WHERE postId = {$postId}";
			if (!$result2 = $mysqli->query($query2)){
				error_log("Cannot count id");
				return false;}
			$row2 = $result2->fetch_assoc();
			//number of comments on post
			$commentCount = $row2['count(id)'];
			$addComment = 
"<a href='".$baseUrl.$path."' id='commentBottom'>Comments</a><span id='commentCount'>$commentCount</span>";
			
			$query3 = "SELECT count(likes) FROM blog_likes WHERE postId = {$postId}";
			if (!$result3 = $mysqli->query($query3)){
				error_log("Cannot count likes");
				return false;	}
			$row3 = $result3->fetch_assoc();
			if ($row3['count(likes)'] != 1)
				$likeCount = $row3['count(likes)'];
			elseif ($row3['count(likes)'] == 1)
				$likeCount = $row3['count(likes)'];
			
			if ($isLoggedIn){
				$query4 = "SELECT userId FROM blog_likes WHERE postId = {$postId} and userId = {$userId}";
				if (!$result4 = $mysqli->query($query4)){
					error_log("Cannot find id");
					return false;	}
				$row4 = $result4->fetch_assoc();
				$testId = $row4['userId'];}
			
			if ($isLoggedIn && !$testId){
				$like = "<span style='color:#0094AC; cursor:pointer;' class='likePost' id='like$postId' title='$likeCount'>Like</span>";
				$likeForm = 
"<script>
$(document).ready(function(){
	$(\"#like$postId\").click(function(){ 
		$.post(\"".$baseUrl."likeBlog.php\",{userId:\"$userId\",postId:\"$postId\"})
		.done(function(data){location.reload();});
	});
});
</script>"; 
			}elseif ($isLoggedIn && $testId){
				$like = "<span style='color:#0094AC; cursor:pointer;' id='unlike$postId'>Unlike</span>";
				$likeForm =
"<script>
$(document).ready(function(){
	$(\"#unlike$postId\").click(function(){ 
		$.post(  \"".$baseUrl."unlikeBlog.php\", {  
			userId: \"$userId\", 
			postId: \"$postId\"  
		})
		.done(function() { 
			location.reload();
		});
	});
});
</script>";
			}else{
				$like = "";
				$likeForm = "";}
			
			if($tagTextArray = $this->tags($postId,$baseUrl)){			
				$tagCount = count($tagTextArray);
			
				foreach($tagTextArray as $key=>$val){
					
					if ($key == 0 && $tagCount != 1)
						$tagLynx = "Tags: ".$val.", ";
					elseif ($key != $tagCount - 1 && $tagCount != 1)
						$tagLynx .= $val.", ";
					elseif ($key == $tagCount - 1 && $tagCount != 1)
						$tagLynx .= $val;	
					else
						$tagLynx = "Tag: ".$val;	}
			}else 
				$tagLynx = "";		

			//blog post array
			$blogPosts .= 
"<span class='title'>
<a href='".$baseUrl.$path."'>" . htmlspecialchars($title) . "</a>
<p>Posted on " . date('F d, Y', $date)." | $addComment $like<span id='likeCount'>$likeCount</span></p></span>
<span class='postMultiple'>" . $post . "</span>
<span class='date'><a href='".$baseUrl.$path."'>Read More</a></span>
<span class='share'>Share: <a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-count=\"horizontal\" data-url=\"".$baseUrl.$path."\">Tweet</a>
<div class=\"g-plusone\" data-size=\"medium\" data-count=\"true\" data-href=\"".$baseUrl.$path."\"></div>
<div class=\"fb-like\" data-send=\"false\" data-layout=\"button_count\" data-width=\"1\" data-show-faces=\"false\" data-action=\"like\" data-href=\"".$baseUrl.$path."\" style=\"bottom:3px;\"></div></span>
<span class='tags'>".$tagLynx."</span>
".$likeForm;	
		}	
		//return arry of blog posts
		return $blogPosts;
	}//end multiPost function
	
	
	
	
	
	
	private function tags($postId, $baseUrl)
	{
		$tagTextArray = array();
		
		if (isset($_GET['year']))
			$year = $_GET['year'];
		else
			$year = "";
		if (isset($_GET['month']))
			$month = $_GET['month'];
		else
			$month = "";
		if (isset($_GET['page']))
			$page = $_GET['page'];
		else
			$page = "";
		
		//connect to database
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		
		$query = "SELECT tagId FROM post_tags WHERE postId = $postId";
		if(!$result = $mysqli->query($query))
		{
			error_log("could not get tag id where postId = $postId");	
		}
		while($row = $result->fetch_assoc())
		{
			$tagId = $row['tagId'];
			$queryTag = "SELECT tag FROM tags WHERE id = $tagId";
			if(!$resultTag = $mysqli->query($queryTag))
			{
				error_log("could not get tag from id $tagId");	
			}
			$rowTag = $resultTag->fetch_assoc();
			$tagText = $rowTag['tag'];
			if ($year != "" && $month != "" && $page != "")
				$tagTextArray[] = "<a class='tagPost' href='$baseUrl$year/$month/tag/$tagId/page/$page'>$tagText</a>";
			elseif ($year != "" && $month != "" && $page == "")
				$tagTextArray[] = "<a class='tagPost' href='$baseUrl$year/$month/tag/$tagId'>$tagText</a>";
			elseif ($year != "" && $month == "" && $page != "")
			 	$tagTextArray[] = "<a class='tagPost' href='$baseUrl$year/tag/$tagId/page/$page'>$tagText</a>";
			elseif ($year != "" && $month == "" && $page == "")
			 	$tagTextArray[] = "<a class='tagPost' href='$baseUrl$year/tag/$tagId'>$tagText</a>";
			elseif ($year == "" && $month == "" && $page != "")
				$tagTextArray[] = "<a class='tagPost' href='".$baseUrl."tag/$tagId/page/$page'>$tagText</a>";
			elseif ($year == "" && $month == "" && $page == "")
				$tagTextArray[] = "<a class='tagPost' href='".$baseUrl."tag/$tagId'>$tagText</a>";
		}
		
		return $tagTextArray;
	}
	
	
	
	
	
	
	//generate page links for default view of blog
	public function multiPostLynx($perpage, $page, $baseUrl, $year, $month, $tag)
	{
		//define variable
		$lynx = '';

		//connect to database
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno){
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
			return false;
		}
		// count number of blog posts
		
		if ($year == "" && $month == "" && $tag == ""){
			// select 5 blog posts based on page number
			$query = "SELECT count(blog.id) as count FROM blog";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}
		elseif ($year != "" && $month == "" && $tag == ""){
			$nextYear = $year + 1;
			$date = $year ."-01-01";
			$nextDate = $nextYear ."-01-01"; 
			
			$query = "SELECT count(id as count) FROM blog WHERE date BETWEEN '". $date ."' and '". $nextDate ."'";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}
		elseif ($year != "" && $month != "" && $tag == ""){
			$nextMonth = $month + 1;
			if ($nextMonth < 10)
				$nextMonth = "0" . $nextMonth;	
			$date = $year ."-". $month ."-01";
			$nextDate = $year ."-". $nextMonth ."-01";
			if ($month == 12)
				$nextDate = $year + 1 ."-01-01";
			
			$query = "SELECT count(id) as count FROM blog WHERE date BETWEEN '". $date ."' and '". $nextDate ."'";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}
		elseif ($year == "" && $month == "" && $tag != ""){
			
			$query = "SELECT count(blog.id) as count FROM blog INNER JOIN post_tags ON blog.id = post_tags.postId WHERE tagId = $tag";
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}
		elseif ($year != "" && $month == "" && $tag != ""){
			$nextYear = $year + 1;
			$date = $year ."-01-01";
			$nextDate = $nextYear ."-01-01"; 
			
			$query = "SELECT count(blog.id) as count FROM blog INNER JOIN post_tags ON blog.id = post_tags.postId WHERE date BETWEEN '". $date ."' and '". $nextDate ."' AND post_tags.tagId = ".$tag;
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}
		}
		elseif ($year != "" && $month != "" && $tag != ""){
			$nextMonth = $month + 1;
			if ($nextMonth < 10)
				$nextMonth = "0" . $nextMonth;		
			$date = $year ."-". $month ."-01";
			$nextDate = $year ."-". $nextMonth ."-01";
			if ($month == 12)
				$nextDate = $year + 1 ."-01-01";
	
			$query = "SELECT count(blog.id) as count FROM blog INNER JOIN post_tags ON blog.id = post_tags.postId WHERE date BETWEEN '". $date ."' and '". $nextDate ."' AND post_tags.tagId = ".$tag;
			if (!$result = $mysqli->query($query)){
				error_log("Cannot retrieve blog");
				return false;}	
		}	
		
		if (!$result = $mysqli->query($query)){
			error_log("Cannot retrieve id count");
			return false;	}
		$row = $result->fetch_assoc();
		$rowCount = $row['count'];
		// find the number of pages based on count of blog posts
		$pages = floor(($row['count'] + $perpage - 1) / $perpage);
	
		// generate page numbers
		for ($i=0; $i<$pages; $i++){
			if ($i != $page && $year == "" && $month == "" && $tag == "")
				$lynx .= " <a href='".$baseUrl."page/".$i."'>".($i+1)."</a>";	
			elseif ($i != $page && $year != "" && $month == "" && $tag == "")
				$lynx .= " <a href='".$baseUrl.$year."/page/".$i."'>".($i+1)."</a>";
			elseif ($i != $page && $year != "" && $month != "" && $tag == "")
				$lynx .= " <a href='".$baseUrl.$year."/".$month."/page/".$i."'>".($i+1)."</a>";
			elseif ($i != $page && $year == "" && $month == "" && $tag != "")
				$lynx .= " <a href='".$baseUrl."tag/".$tag."/page/".$i."'>".($i+1)."</a>";
			elseif ($i != $page && $year != "" && $month == "" && $tag != "")
				$lynx .= " <a href='".$baseUrl.$year."/tag/".$tag."/page/".$i."'>".($i+1)."</a>";
			elseif ($i != $page && $year != "" && $month != "" && $tag != "")
				$lynx .= " <a href='".$baseUrl.$year."/".$month."/tag/".$tag."/page/".$i."'>".($i+1)."</a>";
			else
				$lynx .= "	<b>".($i+1)."</b>";	}		
		
		//return page link array
		return $lynx;
	}
	
	
	
	
	
	//generate single post page
	public function singlePost($postId, $baseUrl, $isLoggedIn, $userId)
	{
		//connect to database
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno){
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;}
		// select the blog post the user is viewing 
		$query = "SELECT * FROM blog WHERE id = '{$postId}'";
		if (!$result = $mysqli->query($query)){
			error_log("Cannot retrieve blog post");
			return false;}

		//generate the blog post
		$row = $result->fetch_assoc();
		$postId = $row['id']; //blog post id
		$title = $row['title'];
		$date = strtotime($row['date']); //date posted on
		$post = $row['post']; //blog post full text
		$fname = $row['fname'];
		$dateExplode = explode("-", $row['date']);
		$year = $dateExplode[0];
		$month = $dateExplode[1];
		$path = $year."/".$month."/".$fname.".html";
		
		//count comments on post
		$query2 = "SELECT count(id) FROM comments WHERE postId = {$postId}";
		if (!$result2 = $mysqli->query($query2)){
			error_log("Cannot count id");
			return false;}
		$row2 = $result2->fetch_assoc();
		//number of comments on post
		$commentCount = $row2['count(id)'];
		//if comment count is equal to one change plurality of word
		if ($commentCount != 1){
			//multiple comments
			$addComment = 
"<a href='".$baseUrl.$path."' id='commentBottom'>$commentCount Comments</a>";
		}else{
			//single comment
			$addComment =
"<a href='".$baseUrl.$path."' id='commentBottom'>$commentCount Comment</a>";}
			
		$query3 = "SELECT count(likes) FROM blog_likes WHERE postId = {$postId}";
		if (!$result3 = $mysqli->query($query3)){
			error_log("Cannot count likes");
			return false;	}
		$row3 = $result3->fetch_assoc();
		if ($row3['count(likes)'] != 1)
			$likeCount = $row3['count(likes)'] . " Likes";
		elseif ($row3['count(likes)'] == 1)
			$likeCount = $row3['count(likes)'] . " Like";
			
		if ($isLoggedIn){
			$query4 = "SELECT userId FROM blog_likes WHERE postId = {$postId} and userId = {$userId}";
			if (!$result4 = $mysqli->query($query4)){
				error_log("Cannot find id");
				return false;	}
			$row4 = $result4->fetch_assoc();
			$testId = $row4['userId'];}
		
			if ($isLoggedIn && !$testId){
				$like = "| <span style='color:#0094AC; cursor:pointer;' id='like$postId'>Like</span>";
				$likeForm = 
"<script>
$(document).ready(function(){
	$(\"#like$postId\").click(function(){ 
		$.post(  \"".$baseUrl."likeBlog.php\", {  
			userId: \"$userId\", 
			postId: \"$postId\"  	
		})
		.done(function( data ) { 
			location.reload();
		});
	});
});
</script>"; }elseif ($isLoggedIn && $testId){
				$like = "| <span style='color:#0094AC; cursor:pointer;' id='unlike$postId'>Unlike</span>";
				$likeForm =
"<script>
$(document).ready(function(){
	$(\"#unlike$postId\").click(function(){ 
		$.post(  \"".$baseUrl."unlikeBlog.php\", {  
			userId: \"$userId\", 
			postId: \"$postId\"  
		})
		.done(function( data ) { 
			location.reload();
		});
	});
});
</script>";}else{
				$like = "";
				$likeForm = "";}
			
			if($tagTextArray = $this->tags($postId,$baseUrl)){			
				$tagCount = count($tagTextArray);
			
				foreach($tagTextArray as $key=>$val){
					if ($key == 0 && $tagCount != 1)
						$tagLynx = "Tags: ".$val.", ";
					elseif ($key != $tagCount - 1 && $tagCount != 1)
						$tagLynx .= $val.", ";
					elseif ($key == $tagCount - 1 && $tagCount != 1)
						$tagLynx .= $val;	
					else
						$tagLynx = "Tag: ".$val;}
			} else 
				$tagLynx = "";		

		//blog post 
		$blogPost = 
"<span class='title'>
<a href='".$baseUrl.$path."'>" . htmlspecialchars($title) . "</a>
<p>Posted on " . date('F d, Y', $date)." | $addComment | $likeCount $like</p></span>
<span class='postMultiple'>" . $post . "</span>
<span class='share'>Share: <a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-count=\"horizontal\" data-url=\"".$baseUrl.$path."\">Tweet</a>
<div class=\"g-plusone\" data-size=\"medium\" data-count=\"true\" data-href=\"".$baseUrl.$path."\"></div>
<div class=\"fb-like\" data-send=\"false\" data-layout=\"button_count\" data-width=\"1\" data-show-faces=\"true\" data-action=\"like\" data-href=\"".$baseUrl.$path."\" style=\"bottom:3px;\"></div></span>
<span class='tags'>".$tagLynx."</span>
".$likeForm;	

		//return generated blog post
		return $blogPost;
	}
	
	
	
	
	
	
	public function comments($postId, $baseUrl){
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
		$query = "SELECT * FROM comments WHERE postId = '{$postId}' order by time desc";
		if (!$result = $mysqli->query($query)){
			error_log("Cannot retrieve comments");
			return false;}
		// generate comment array		
		while($row = $result->fetch_assoc()){
			$comId = $row['id']; //comment id
			$cDate = strtotime($row['time']); //date comment posted on
			$dateAgo = $this->ago($cDate);
			$comment = $row['comment']; //comment text
			$name = $row['name'];
			if (!empty($row['email'])){
				$email = $row['email'];
				$title = 
"<a href='mailto:".$email."'>".$name."</a>";
			}else{
				$title = $name;	}
			
			// select the blog post the user is viewing 
			$query2 = "SELECT * FROM blog WHERE id = '{$postId}'";
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
				$comPost[$comId] = 
"<div class='commentPost' id='".$comId."'>
<span class='commentTitle'>".$title." said:	</span>
<span class='commentDate'><a href='".$baseUrl. $path ."#".$comId."'>" . /*date('F d, Y', $cDate) . " at " . date('h:i A', $cDate)*/ $dateAgo . "</a></span>
<p>".$comment."</p>
</div>";} 
		}	
		
		//return comment array
		return $comPost;
	}
	
	
	
	
	
	
	//genrate links for single post view
	public function singlePostLynx($postId, $baseUrl){
		//define variables;
		$postIdArray = $postNameArray = $nextID = $prevID = $lynx = '';	
		
		//connect to database
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno){
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;}
		$query = "SELECT * FROM blog order by id desc";
		if (!$result = $mysqli->query($query)){
			error_log("Cannot retrieve blog post");
			return false;}
		while($row = $result->fetch_assoc()){
			$fname = $row['fname'];
			$postNameArray[] = $fname;}
		$query = "SELECT * FROM blog WHERE id = '{$postId}'  ";
		if (!$result = $mysqli->query($query)){
			error_log("Cannot retrieve blog post");
			return false;}
		$row = $result->fetch_assoc();
		$postfname = $row['fname'];
		
		//current id of blog post being viewed
		$current = array_search($postfname, $postNameArray);
		
		//if previous blog post id exists, get id
		if (array_key_exists($current-1, $postNameArray)){
			$prevID = $postNameArray[$current-1];
			$queryPrev = "SELECT * FROM blog WHERE fname = '{$prevID}'  ";
			if (!$resultPrev = $mysqli->query($queryPrev)){
				error_log("Cannot retrieve blog post");
				return false;}
			$rowPrev = $resultPrev->fetch_assoc();
			$titlePrev = $rowPrev['title'];
			$dateExplodePrev = explode("-", $rowPrev['date']);
			$yearPrev = $dateExplodePrev[0];
			$monthPrev = $dateExplodePrev[1];
			$pathPrev = $yearPrev."/".$monthPrev."/".$prevID.".html";}
		
		//if next blog post id exists, get id
		if (array_key_exists($current+1, $postNameArray)){	
			$nextID = $postNameArray[$current+1];
			$queryNext = "SELECT * FROM blog WHERE fname = '{$nextID}'  ";
			if (!$resultNext = $mysqli->query($queryNext)){
				error_log("Cannot retrieve blog post");
				return false;}
			$rowNext = $resultNext->fetch_assoc();
			$titleNext = $rowNext['title'];
			$dateExplodeNext = explode("-", $rowNext['date']);
			$yearNext = $dateExplodeNext[0];
			$monthNext = $dateExplodeNext[1];
			$pathNext = $yearNext."/".$monthNext."/".$nextID.".html";}
		
		//if previous id, not empty generate link
		if (!empty($prevID)){
			$lynx .= 
"<a style='min-width:200px;' href='".$baseUrl.$pathPrev."'.html><- ".$titlePrev."</a>";			
		}else{
			$lynx .= 
"<span style='min-width:200px;'></span>";}
		//generate back link
		$lynx .= 
"<div style='min-width:200px; text-align:center;'><a href='index.php'><b>Back</b></a></div>";
		//if next id not empty, generate link
		if (!empty($nextID)){
			$lynx .= 
"<a style='min-width:200px; text-align:right;' href='".$baseUrl.$pathNext."'>".$titleNext." -></a>";
		}else{
			$lynx .= 
"<span style='min-width:200px;'></span>";}
		
		//return array of links
		return $lynx;	
	}
	
	
	
	
	
	
	public function loginForm($isLoggedIn, $url, $baseUrl){
		$login = $emailErr = $passErr = '';
		
		if (!$isLoggedIn){
			if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])){
				unset($_SESSION['formAttempt']);
		
				if (isset($_SESSION['error'][0]))
					$emailErr = $_SESSION['error'][0];
			
				if (isset($_SESSION['error'][1]))
					$emailErr = $_SESSION['error'][1];
			
				if (isset($_SESSION['error'][2]))
					$passErr = $_SESSION['error'][2];
			
				if (isset($_SESSION['error'][3]))
					$emailErr = $_SESSION['error'][3];
				}
	
			//generage login form
			$login = 
"<form id='login' action='".$baseUrl."login_request.php' method='post'>\n
<p id='loginTitle'>Log In</p>
<input id='username' type='text' name='email' placeholder='Username'><span class='error'>".$emailErr."</span>
<input id='pass' type='password'' name='password' placeholder='Password'><span class='error'>".$passErr."</span>
<input type='hidden' name='location' value='". $url ."'>
<input id='lSubmit' type='submit' value='Submit'>\n
</form>";	
		}else{	
			$login = 
"<div id='login'>
<p id='loginTitle'>Log Out</p>
<a href='".$baseUrl."logout.php'>Logout</a>
</div>";
		}
		
		return $login;
	}
	
	
	
	
	
	
	public function archiveText()
	{
		$archiveText = '';
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno){
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
					return false;}
		
		$query = "SELECT * FROM blog GROUP BY YEAR(date), MONTH(date) ORDER BY date DESC ";
		if (!$result = $mysqli->query($query)){
			error_log("Cannot retrieve blog");
			return false;}
		
		$archiveText = "<div id='archive'><p id='archiveTitle'>Archive</p>";
		
		while($row = $result->fetch_assoc()){
			$dateExplode = explode("-", $row['date']);
			$datetime = strtotime($row['date']);
 			$tday = date("F, Y", $datetime);
			$archiveText .= "<a href='".$dateExplode[0]."/".$dateExplode[1]."/'>{$tday}</a><br />	";}
		
		$archiveText .= "</div>";
		
		return $archiveText;
	}
	
	
	
	
	

	private function ago($time){
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
}