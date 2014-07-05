<?php
class Archive
{
	public $firstDate;
	public $nextDate;

	public function archiveText()
	{
		$archiveText = '';
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
					return false;
		}
		
		$query = "SELECT * FROM blog GROUP BY YEAR(date), MONTH(date) ORDER BY date DESC ";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve blog");
			return false;
		}
		
		$archiveText .= "<div id='archive'><p id='archiveTitle'>Archive</p>";
		
		while($row = $result->fetch_assoc())
		{
			$dateExplode = explode("-", $row['date']);
			$datetime = strtotime($row['date']);
 			$tday = date("F, Y", $datetime);
			$archiveText .= "<a href='".$dateExplode[0]."/".$dateExplode[1]."/'>{$tday}</a><br />	";
		}
		
		$archiveText .= "</div>";
		
		return $archiveText;
	}
	
	public function archivePosts($year,$month,$startat,$perpage)
	{
		$date='';
		$blogPosts = '';
		$url = '';
		
		$nextMonth = $month + 1;

		if ($nextMonth < 10)
		{
			$nextMonth = "0" . $nextMonth;	
		}
		
		$date = $year ."-". $month ."-01";
		$nextDate = $year ."-". $nextMonth ."-01";
		$this->firstDate = $date;
		$this->nextDate = $nextDate; 
		
		if ($month == 12)
		{
			$nextDate = $year + 1 ."-01-01";
		}
		
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
					return false;
		}
		
		$query = "SELECT * FROM blog WHERE date BETWEEN '". $date ."' and '". $nextDate ."' ORDER BY date DESC limit $startat, $perpage";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve blog");
			return false;
		}

		while($row = $result->fetch_assoc())
		{
			$postId = $row['id'];
			$title = $row['title'];
			$date = strtotime($row['date']);
			$post = $row['preview'];
			$fname = $row['fname'];
			$dateExplode = explode("-", $row['date']);
			$year = $dateExplode[0];
			$month = $dateExplode[1];
			$path = $year."/".$month."/".$fname.".html";
		
			//count comments on post
			$query2 = "SELECT count(id) FROM comments WHERE postId = $postId";
			if (!$result2 = $mysqli->query($query2))
			{
				error_log("Cannot retrieve blog");
				return false;
			}
			$row2 = $result2->fetch_assoc();
			$commentCount = $row2['count(id)'];
		
			if ($commentCount != 1)
				{
					$addComment = "<a href='" . $path . "' id='commentBottom'>$commentCount Comments</a></span>";
				}
				else
				{
					$addComment = "<a href='" . $path . "' id='commentBottom'>$commentCount Comment</a></span>";
				}
		
			$blogPosts[$postId] = "<span class='title'><a href='" . $path . "'>" . htmlspecialchars($title) . "</a><p>Posted on " . date('F d, Y', $date)." | $addComment</p></span>\n
								   <span class='postMultiple'>" . $post . "</span>\n
								   <span class='date'><a href='" . $path . "'>Read More</a>";
			
		}	
		
		return $blogPosts;
	}
	
	public function archiveLynx($perpage, $page, $year, $month)
	{
		$lynx = '';
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
					return false;
		}
		
		// count number of blog posts
		$query = "SELECT count(id) FROM blog WHERE date BETWEEN '". $this->firstDate ."' and '". $this->nextDate ."'";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve id count");
			return false;	
		}
		$row = $result->fetch_assoc();
		$rowCount = $row['count(id)'];
		// find the number of pages based on count of blog posts
		$pages = floor(($row['count(id)'] + $perpage - 1) / $perpage);
	
		// generate page numbers
		for ($i=0; $i<$pages; $i++)
		{
			if ($i != $page)
			{
				$lynx .= " <a href='".$year."/".$month."/page/".$i."'>".($i+1)."</a>";	
			}
			else
			{
				$lynx .= "	<b>".($i+1)."</b>";
			}
		}
		
		return $lynx;
	}
}
?>