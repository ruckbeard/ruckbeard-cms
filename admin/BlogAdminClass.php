<?php
class BlogAdmin
{	
	public $order;
	
	public function multiPost($perpage, $baseUrl)
	{
		//define variables
		if (isset($_POST['postPage']))
		{
			$postPage = htmlspecialchars($_POST['postPage']);
		} else
		{
			$postPage = 0;
		}
		
		$startat = $postPage * $perpage;
		
		if (isset($_POST['post_o']))
		{
			$postOrder = $_POST['post_o'];
		}
		else
		{
			$postOrder = "d_d";
		}
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		
		$option = array(
			array('t_a', 't_d', 'Title▲', 'd_d', 'Date', 'SELECT * FROM blog order by title asc limit '.$startat.', '.$perpage,
"<option value='t_a' selected>Title (ascending)</option>
<option value='t_d'>Title (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>"),
			array('t_d', 't_a', 'Title▼', 'd_a', 'Date', 'SELECT * FROM blog order by title desc limit '.$startat.', '.$perpage,
"<option value='t_a'>Title (ascending)</option>
<option value='t_d' selected>Title (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>"),
			array('d_a', 't_d', 'Title', 'd_d', 'Date▲', 'SELECT * FROM blog order by date asc limit '.$startat.', '.$perpage,
"<option value='t_a'>Title (ascending)</option>
<option value='t_d'>Title (descending)</option>
<option value='d_a' selected>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>"),	
			array('d_d', 't_a', 'Title', 'd_a', 'Date▼', 'SELECT * FROM blog order by date desc limit '.$startat.', '.$perpage, 
"<option value='t_a'>Title (ascending)</option>
<option value='t_d'>Title (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d' selected>Date (descending)</option>"),	
		);
		foreach($option as $key=>$val)
		{
			foreach($val as $key2=>$val2)
			{
				if ($option[$key][0] == $postOrder)
				{
					$orderArray[] = $val2;
				}
			}
		}
		$query = $orderArray[5];
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve blog");
			return false;
		}
		
		$blogPosts = 
"<div id='toolbar' class='ui-widget-header ui-corner-all' style='padding:5px;'>
<button id='newPostButton' title='Open new post dialog.'>New Post</button>
<a href='refreshBlog.php' id='refreshBlogButton' title='Refresh post files to match any changes to template file.'>Refresh Blog</a>
<form style='float:right; margin:5px;'>
<select name='post_o' id='selectPostOrder'>
".$orderArray[6]."
</select>
</form>
</div>
<script>
$(document).ready(function(){
	$(\"#newPostButton\").button({
		icons: {
			secondary: \"ui-icon-plus\"
		}
	});
	$(\"#refreshBlogButton\").button({
		icons: {
			secondary: \"ui-icon-refresh\"
		}
	});
	$('#selectPostOrder').change(function(){
		var order;
		$('#selectPostOrder option:selected').each(function() {
			order = $(this).val();
		});
		$.post('postAdminAjax.php',
		{
			postPage:$postPage,
			post_o:order
		},
		function(data){
			$('#tabs-1').html(data);
		});
	});
	$('#titleLink').click(function(){
		$.post('postAdminAjax.php',
		{
			postPage:$postPage,
			post_o:'$orderArray[1]'
		},
		function(data){
			$('#tabs-1').html(data);
		});
	});
	$('#dateLink').click(function(){
		$.post('postAdminAjax.php',
		{
			postPage:$postPage,
			post_o:'$orderArray[3]'
		},
		function(data){
			$('#tabs-1').html(data);
		});
	});
});
</script>
<form action='".$baseUrl."admin/deleteAll.php' method='post' id='postForm'>
<table class='admin_post_table'>
<tr>
<td style='width: 75px'><b>ID</b></td>
<td><span style='color:#0094AC; cursor:pointer;' id='titleLink'><b>".$orderArray[2]."</b></span></td>
<td><span style='color:#0094AC; cursor:pointer;' id='dateLink'><b>".$orderArray[4]."</b></span></td>
<td style='width: 39px'><b>Edit</b></td>
<td style='width: 62px'><b>Delete</b></td>
</tr>";

	
		//generate array of blog posts
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
			//$query2 = "SELECT count(id) FROM comments WHERE postId = $postId";
			//if (!$result2 = $mysqli->query($query2))
			//{
			//	error_log("Cannot retrieve blog");
			//	return false;
			//}
			//$row2 = $result2->fetch_assoc();
			//$commentCount = $row2['count(id)'];
			
			$blogPosts .= "
<tr id='tableRow$postId'>
<script>
$(document).ready(function(){
	$(\"#delete$postId\").click(function(){ 
		$(\"#deletePost\").data(\"postId\",\"".$postId."\").dialog(\"open\") 
	});
	
	$(\"#view$postId\").click(function(){ 
		var postId = $postId;
		$.post('http://127.0.0.1/ruckbeard/admin/viewPost.php', {postId: postId},
		function(data) {
			$(\"#viewPost\").html(data);
		});
		$(\"#viewPost\").dialog(\"open\");
	});
	
	$(\"#edit$postId\").click(function(){ 
		var postId = $postId;
		var ed = tinymce.get('#tinytext');
		$(\"#postTitleUpdate\").val(\"$title\");
		$.post('http://127.0.0.1/ruckbeard/admin/editPost.php', {postId: postId},
		function(data) {
			ed.setContent(data);
		});
		$.post('http://127.0.0.1/ruckbeard/admin/editPostOption.php', {postId: postId},
		function(data) {
			$(\"#tagsUpdate\").html(data);
		});
		var str;
		var n;
		$.post('editPostTags.php', {postId: postId},
		function(data,status) {
			str = data;
			n = str.split(\"<!++separator++>\");
			for(i=0;i<n.length;i++)
			{
				if(n[i].match(\"<span class='tag'>\"))
				{
					$(\"#tagAreaUpdate\").append(n[i]);
				}
				else
				{
					$(\"#tagIdAreaUpdate\").append(n[i]);
				}
			}
		});
		
		
		$(\"#getPostId\").val(postId);
		$(\"#editPostDialog\").dialog(\"open\");
	});
}); 
</script>
<td style='display:block;'><input style='display:inline-block;' type='checkbox' id='check' name='id[]' value='".$postId."'><span style='display:inline-block; color:#0094AC; cursor:pointer;' id='view$postId'>$postId</span></td>
<td>".$title."</td>
<td>".date('F d, Y',$date)." at ".date('h:m A',$date)."</td>
<td><span style='display:inline-block; color:#0094AC; cursor:pointer;' id='edit$postId'>Edit</span></td>
<td><span style='color:#0094AC; cursor:pointer;' id='delete$postId'>Delete</span></td>
</tr>";

			
		}
		
		$blogPosts .= "
</table>
<table style='width: 100%;'>
<script>
$(document).ready(function(){
	$(\"#deleteAll\").click(function(){ 
		var data = $('input[name=\"id[]\"]:checkbox:checked').map(function(){
			return this.value;
		}).get();
		$(\"#deleteAllPost\").data(\"id\", data).dialog(\"open\"); 
	});
	
	$(\"#newPostButton\").click(function(){
		$(\"#newPostDialog\").dialog(\"open\");
	});
});
								
function checkAll(bx)
{
	var cbs = document.getElementById('postForm');
	for(var i=0; i < cbs.length; i++) 
	{
		if(cbs[i].type == 'checkbox') 
		{
			cbs[i].checked = bx.checked;
		}
	}	
}
</script>
<tr>
<td style='display: block;'><input style='display: inline-block;' type='checkbox' id='check_all' title='Check All' onclick='checkAll(this)'><label style='display: inline-block;' for='check_all'>&nbsp;Check All</label></td>
<td style='text-align: right;'><span style='color:#0094AC; cursor:pointer;' id='deleteAll'>Delete All</span></td>
<tr>
</table>
</form>";
		
		return $blogPosts;
	}
	
	
	
	
	
	
	public function tagDisplay($perpage, $baseUrl)
	{	
		if (isset($_POST['tagsPage']))
		{
			$tagsPage = htmlspecialchars($_POST['tagsPage']);
		} else
		{
			$tagsPage = 0;
		}
		
		$startat = $tagsPage * $perpage;
		
		if (isset($_POST['tags_o']))
		{
			$tagsOrder = $_POST['tags_o'];	
		}
		else
		{
			$tagsOrder = "id_d";
		}

		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		
		$option = array(
			array('id_a', 'id_d', 'ID▲', 't_d', 'Tag', "SELECT * FROM tags order by id asc limit $startat, $perpage",
"<option value='id_a' selected>ID (ascending)</option>
<option value='id_d'>ID (descending)</option>
<option value='t_a'>Tag (ascending)</option>
<option value='t_d'>Tag (descending)</option>"),
			array('id_d', 'id_a', 'ID▼', 't_d', 'Tag', "SELECT * FROM tags order by id desc limit $startat, $perpage",
"<option value='id_a'>ID (ascending)</option>
<option value='id_d' selected>ID (descending)</option>
<option value='t_a'>Tag (ascending)</option>
<option value='t_d'>Tag (descending)</option>"),
			array('t_a', 'id_d', 'ID', 't_d', 'Tag▲', "SELECT * FROM tags order by tag asc limit $startat, $perpage",
"<option value='id_a'>ID (ascending)</option>
<option value='id_d'>ID (descending)</option>
<option value='t_a' selected>Tag (ascending)</option>
<option value='t_d'>Tag (descending)</option>"),
			array('t_d', 'id_a', 'ID', 't_a', 'Tag▼', "SELECT * FROM tags order by tag desc limit $startat, $perpage",
"<option value='id_a'>ID (ascending)</option>
<option value='id_d'>ID (descending)</option>
<option value='t_a'>Tag (ascending)</option>
<option value='t_d' selected>Tag (descending)</option>")
		);
		
		foreach($option as $key=>$val)
		{
			foreach($val as $key2=>$val2)
			{
				if ($option[$key][0] == $tagsOrder)
				{
					$orderArray[] = $val2;
				}
			}
		}
		$query = $orderArray[5];
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve blog");
			return false;
		}
		
		$blogPosts = 
"<div id='tagsToolbar' class='ui-widget-header ui-corner-all' style='padding:5px;'>
<button id='newTagsButton' title='Open new tags dialog.'>New Tags</button>
<form style='float:right; margin:5px;'>
<select name='post_o' id='selectTagsOrder'>
".$orderArray[6]."
</select>
</form>
</div>
<script>
$(document).ready(function(){
	$(\"#newTagsButton\").button({
		icons: {
			secondary: \"ui-icon-plus\"
		}
	});
	$('#selectTagsOrder').change(function(){
		var order;
		$('#selectTagsOrder option:selected').each(function() {
			order = $(this).val();
		});
		$.post('tagsAdminAjax.php',
		{
			tagsPage:$tagsPage,
			tags_o:order
		},
		function(data){
			$('#tabs-3').html(data);
		});
	});
	$('#tagsIdLink').click(function(){
		$.post('tagsAdminAjax.php',
		{
			tagsPage:$tagsPage,
			tags_o:'$orderArray[1]'
		},
		function(data){
			$('#tabs-3').html(data);
		});
	});
	$('#tagsTitleLink').click(function(){
		$.post('tagsAdminAjax.php',
		{
			tagsPage:$tagsPage,
			tags_o:'$orderArray[3]'
		},
		function(data){
			$('#tabs-3').html(data);
		});
	});
	$(\"#newTagsButton\").click(function(){
		$(\"#newTagsDialog\").dialog(\"open\");
	});
});
</script>
<form id='tagForm'>
<table class='admin_post_table'>
<tr>
<td style='width: 75px;'><span style='color:#0094AC; cursor:pointer;' id='tagsIdLink'><b>".$orderArray[2]."</b></span></td>
<td style='width: 75px;'><b>Count</b></td>
<td><span style='color:#0094AC; cursor:pointer;' id='tagsTitleLink'><b>".$orderArray[4]."</b></span></td>
<td style='width: 39px;'><b>Edit</b></td>
<td style='width: 62px;'><b>Delete</b></td>
</tr>";
	
		//generate array of blog posts
		while($row = $result->fetch_assoc())
		{
			$tagId = $row['id'];
			$tag = $row['tag'];
			
			$query2 = "SELECT count(tagId) FROM post_tags WHERE tagId = {$tagId}";
			if (!$result2 = $mysqli->query($query2))
			{
				error_log("Cannot retrieve tag count");
				return false;
			}
			$row2 = $result2->fetch_assoc();
			$tagCount = $row2['count(tagId)'];
			
			$blogPosts .= "
<tr id='tagsTableRow$tagId'>
<script>
$(document).ready(function(){
	$(\"#tagDelete$tagId\").click(function(){ 
		$(\"#deleteTag\").data(\"tagId\",\"".$tagId."\").dialog(\"open\");
	});
	$(\"#tagView$tagId\").click(function(){
		var tagId = $tagId;
		$.post('http://127.0.0.1/ruckbeard/admin/viewTagPosts.php', {tagId: tagId},
		function(data) {
			$(\"#viewTag\").html(data);
		});
		$(\"#viewTag\").dialog(\"open\");
	});
}); 
</script>
<td style='display:block;'><input style='display: inline-block;' type='checkbox' id='tagCheck' name='tagId[]' value='".$tagId."'><span style='color:#0094AC; cursor:pointer;' id='tagView$tagId'>$tagId</span></td>
<td>".$tagCount."</td>
<td>".$tag."</td>
<td>Edit</td>
<td><span style='color:#0094AC; cursor:pointer;' id='tagDelete$tagId'>Delete</span></td>
</tr>";
		}
		//append extra admin features
		$blogPosts .= "
</table>
<table style='width: 100%;'>
<script>
$(document).ready(function(){
	$(\"#tDeleteAll\").click(function(){ 
		var data = $('input[name=\"tagId[]\"]:checkbox:checked').map(function(){
			return this.value;
		}).get();
		$(\"#deleteAllTag\").data(\"id\", data).dialog(\"open\"); 
	});
});
								
function checkAllTags(bx)
{
	var cbs = document.getElementById('tagForm');
	for(var i=0; i < cbs.length; i++) 
	{
		if(cbs[i].type == 'checkbox') 
		{
			cbs[i].checked = bx.checked;
		}
	}	
}

function refreshTags()
{
	$.post('tagsAdminAjax.php',
	{
		tagsPage:$tagsPage,
		tags_o:\"$tagsOrder\"
	},
	function(data){
		$(\"#tabs-3\").html(data);
	});	
}
</script>
<tr>
<td style='display:block;'><input style='display: inline-block;' type='checkbox' id='check_all_tags' title='Check All' onclick='checkAllTags(this)'><label style='display: inline-block;' for='check_all_tags'>&nbsp;Check All</label></td>
<td style='text-align: right;'><span style='color:#0094AC; cursor:pointer;' id='tDeleteAll'>Delete All</span></td>
<tr>
</table>
</form>";
		
		return $blogPosts;
	}
	
	
	public function newTagsForm($baseUrl)
	{
		$tagForm = 
"<form>
<p>Tag: <input type='text' name='tag[]'></p>
<p>Tag: <input type='text' name='tag[]'></p>
<p>Tag: <input type='text' name='tag[]'></p>
<p>Tag: <input type='text' name='tag[]'></p>
<p>Tag: <input type='text' name='tag[]'></p>
<span id='append'></span>
<input id='newTagFormSubmit' type='button' value='Submit'>
</form>
<span id='addInputs' style='color:#0094AC; cursor:pointer;'>Add More Tags</span>
<script>
$(document).ready(function(){
	$(\"#addInputs\").click(function(){
		$(\"#append\").append(\"<p>Tag: <input type='text' name='tag[]'></p>\");
	});
	$(\"#newTagFormSubmit\").click(function(){
		var data = $('input[name=\"tag[]\"]').map(function(){
			return this.value;
		}).get();
		$(\"#append\").append(\"<p>data</p>\");
		$.post('tagsCreate.php',
		{
			tag:data,
		})
		.done(function(){
			refreshTags();
			$('#newTagsDialog').dialog('close');
		})
	});
});
</script>
";
		return $tagForm;
	}
	
	public function commentDisplay($startat, $perpage, $baseUrl)
	{
		//define variables
		$i = 0;
		
		if (isset($_GET['comPage']))
		{
			$page = htmlspecialchars($_GET['comPage']);
		} else
		{
			$page = 0;
		}
		
		if (isset($_GET['com_o']))
		{
			$order = $_GET['com_o'];	
			$this->order = $order;
		}
		else
		{
			$order = "d_d";
		}
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		// select 5 blog posts based on page number
		if ($order == "d_d")
		{
			$query = "SELECT * FROM comments order by time desc limit $startat, $perpage";
			$dateLink = "d_a";
			$dateText = "Date▼";
			$postIdLink = "pid_a";
			$postIdText = "Post ID";
			$nameLink = "n_a";
			$nameText = "Name";
			$emailLink = "e_a";
			$emailText = "Email";
			$option =
"<option value='pid_a'>Post ID (ascending)</option>
<option value='pid_d'>PostID (descending)</option>
<option value='n_a'>Name (ascending)</option>
<option value='n_d'>Name (descending)</option>
<option value='e_a'>Email (ascending)</option>
<option value='e_d'>Email (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d' selected>Date (descending)</option>";
		}
		elseif($order == "d_a")
		{
			$query = "SELECT * FROM comments order by time asc limit $startat, $perpage";
			$dateLink = "d_d";
			$dateText = "Date▲";
			$postIdLink = "pid_d";
			$postIdText = "Post ID";
			$nameLink = "n_d";
			$nameText = "Name";
			$emailLink = "e_d";
			$emailText = "Email";
			$option =
"<option value='pid_a'>Post ID (ascending)</option>
<option value='pid_d'>PostID (descending)</option>
<option value='n_a'>Name (ascending)</option>
<option value='n_d'>Name (descending)</option>
<option value='e_a'>Email (ascending)</option>
<option value='e_d'>Email (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d' selected>Date (descending)</option>";
		}
		elseif ($order == "pid_d")
		{
			$query = "SELECT * FROM comments order by postId desc limit $startat, $perpage";
			$dateLink = "d_a";
			$dateText = "Date";
			$postIdLink = "pid_a";
			$postIdText = "Post ID▼";
			$nameLink = "n_a";
			$nameText = "Name";
			$emailLink = "e_a";
			$emailText = "Email";
			$option =
"<option value='pid_a'>Post ID (ascending)</option>
<option value='pid_d' selected>PostID (descending)</option>
<option value='n_a'>Name (ascending)</option>
<option value='n_d'>Name (descending)</option>
<option value='e_a'>Email (ascending)</option>
<option value='e_d'>Email (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>";
		}
		elseif($order == "pid_a")
		{
			$query = "SELECT * FROM comments order by postId asc limit $startat, $perpage";
			$dateLink = "d_d";
			$dateText = "Date";
			$postIdLink = "pid_d";
			$postIdText = "Post ID▲";
			$nameLink = "n_d";
			$nameText = "Name";
			$emailLink = "e_d";
			$emailText = "Email";
			$option =
"<option value='pid_a' selected>Post ID (ascending)</option>
<option value='pid_d'>PostID (descending)</option>
<option value='n_a'>Name (ascending)</option>
<option value='n_d'>Name (descending)</option>
<option value='e_a'>Email (ascending)</option>
<option value='e_d'>Email (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>";
		}
		elseif($order == "n_d")
		{
			$query = "SELECT * FROM comments order by name desc limit $startat, $perpage";
			$dateLink = "d_a";
			$dateText = "Date";
			$postIdLink = "pid_a";
			$postIdText = "Post ID";
			$nameLink = "n_a";
			$nameText = "Name▼";
			$emailLink = "e_a";
			$emailText = "Email";
			$option =
"<option value='pid_a'>Post ID (ascending)</option>
<option value='pid_d'>PostID (descending)</option>
<option value='n_a'>Name (ascending)</option>
<option value='n_d' selected>Name (descending)</option>
<option value='e_a'>Email (ascending)</option>
<option value='e_d'>Email (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>";
		}
		elseif($order == "n_a")
		{
			$query = "SELECT * FROM comments order by name asc limit $startat, $perpage";
			$dateLink = "d_d";
			$dateText = "Date";
			$postIdLink = "pid_d";
			$postIdText = "Post ID";
			$nameLink = "n_d";
			$nameText = "Name▲";
			$emailLink = "e_d";
			$emailText = "Email";
			$option =
"<option value='pid_a'>Post ID (ascending)</option>
<option value='pid_d'>PostID (descending)</option>
<option value='n_a' selected>Name (ascending)</option>
<option value='n_d'>Name (descending)</option>
<option value='e_a'>Email (ascending)</option>
<option value='e_d'>Email (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>";
		}
		elseif($order == "e_d")
		{
			$query = "SELECT * FROM comments order by email desc limit $startat, $perpage";
			$dateLink = "d_d";
			$dateText = "Date";
			$postIdLink = "pid_a";
			$postIdText = "Post ID";
			$nameLink = "n_a";
			$nameText = "Name";
			$emailLink = "e_a";
			$emailText = "Email▼";
			$option =
"<option value='pid_a'>Post ID (ascending)</option>
<option value='pid_d'>PostID (descending)</option>
<option value='n_a'>Name (ascending)</option>
<option value='n_d'>Name (descending)</option>
<option value='e_a'>Email (ascending)</option>
<option value='e_d' selected>Email (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>";
		}
		elseif($order == "e_a")
		{
			$query = "SELECT * FROM comments order by email asc limit $startat, $perpage";
			$dateLink = "d_d";
			$dateText = "Date";
			$postIdLink = "pid_d";
			$postIdText = "Post ID";
			$nameLink = "n_d";
			$nameText = "Name";
			$emailLink = "e_d";
			$emailText = "Email▲";
			$option =
"<option value='pid_a'>Post ID (ascending)</option>
<option value='pid_d'>PostID (descending)</option>
<option value='n_a'>Name (ascending)</option>
<option value='n_d'>Name (descending)</option>
<option value='e_a' selected>Email (ascending)</option>
<option value='e_d'>Email (descending)</option>
<option value='d_a'>Date (ascending)</option>
<option value='d_d'>Date (descending)</option>";
		}
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve blog");
			return false;
		}
		
		if ($page == 0)
		{
			$blogPosts[$i] = 
"<form>
<select name='com_o' onchange='this.form.submit()'>
".$option."
</select>
</form>
<form action='".$baseUrl."admin/deleteAll.php' method='post' id='commentForm'>
<table class='admin_post_table'>
<tr>
<td style='width: 75px'><b>ID</b></td>
<td><a href='".$baseUrl."admin/post_admin.php?com_o=".$postIdLink."'><b>".$postIdText."</b></a></td>
<td><a href='".$baseUrl."admin/post_admin.php?com_o=".$nameLink."'><b>".$nameText."</b></a></td>
<td><a href='".$baseUrl."admin/post_admin.php?com_o=".$emailLink."'><b>".$emailText."</b></a></td>
<td><a href='".$baseUrl."admin/post_admin.php?com_o=".$dateLink."'><b>".$dateText."</b></a></td>
<td style='width: 39px'><b>Edit</b></td>
<td style='width: 62px'><b>Delete</b></td>
</tr>";
		}
		else
		{
			$blogPosts[$i] = 
"<form>
<input type='hidden' value='".$page."' name='comPage'>
<select name='com_o' onchange='this.form.submit()'>
".$option."
</select>
</form>
<form action='".$baseUrl."admin/deleteAll.php' method='post' id='commentForm'>
<table class='admin_post_table'>
<tr>
<td style='width: 75px'><b>ID</b></td>
<td><a href='".$baseUrl."admin/post_admin.php?comPage=".$page."&com_o=".$postIdLink."'><b>".$postIdText."</b></a></td>
<td><a href='".$baseUrl."admin/post_admin.php?comPage=".$page."&com_o=".$nameLink."'><b>".$nameText."</b></a></td>
<td><a href='".$baseUrl."admin/post_admin.php?comPage=".$page."&com_o=".$emailLink."'><b>".$emailText."</b></a></td>
<td><a href='".$baseUrl."admin/post_admin.php?comPage=".$page."&com_o=".$dateLink."'><b>".$dateText."</b></a></td>
<td style='width: 39px'><b>Edit</b></td>
<td style='width: 62px'><b>Delete</b></td>
</tr>";
		}

	
		//generate array of blog posts
		while($row = $result->fetch_assoc())
		{
			$i += 1;
			$comId = $row['id'];
			$postId = $row['postId'];
			$name = $row['name'];
			$email = $row['email'];
			$date = strtotime($row['time']);
			
			$blogPosts[$i] = "
<tr>
<script>
$(document).ready(function(){
	$(\"#deleteComment$comId\").click(function(){ 
		$(\"#deleteComment\").data(\"comId\",\"".$comId."\").dialog(\"open\") 
	});
	
	$(\"#viewComment$comId\").click(function(){ 
		var comId = $comId;
		$.post('http://127.0.0.1/ruckbeard/admin/viewComment.php', {comId: comId},
		function(data) {
			$(\"#viewComment\").html(data);
		});
		$(\"#viewComment\").dialog(\"open\");
	});
}); 
</script>
<td style='display: block;'><input type='checkbox' id='check' name='id[]' value='".$comId."'><span style='color:#0094AC; cursor:pointer;' id='viewComment$comId'>$comId</span></td>
<td>".$postId."</td>
<td>".$name."</td>
<td>".$email."</td>
<td>".date('F d, Y',$date)." at ".date('h:m A',$date)."</td>
<td>Edit</td>
<td><span style='color:#0094AC; cursor:pointer;' id='deleteComment$comId'>Delete</span></td>
</tr>";

			
		}
		
		$blogPosts[$i+1] = "
</table>
<table style='width: 100%;'>
<script>
$(document).ready(function(){
	$(\"#cDeleteAll\").click(function(){ 
		var data = $('input:checkbox:checked').map(function(){
			return this.value;
		}).get();
		$(\"#deleteAllComment\").data(\"id\", data).dialog(\"open\"); 
	});
});
								
function checkAll(bx)
{
	var cbs = document.getElementsByTagName('input');
	for(var i=0; i < cbs.length; i++) 
	{
		if(cbs[i].type == 'checkbox') 
		{
			cbs[i].checked = bx.checked;
		}
	}	
}
</script>
<tr>
<td style='display: inline-flex;'><input type='checkbox' id='check_all' title='Check All' onclick='checkAll(this)'><label for='check_all'>&nbsp;Check All</label></td>
<td style='text-align: right;'><span style='color:#0094AC; cursor:pointer;' id='cDeleteAll'>Delete All</span></td>
<tr>
</table>
</form>";
		
		return $blogPosts;
	}

	
	public function newPost($baseUrl)
	{
		$option = $titleErr = "";
		
		if (isset($_SESSION['error']) && isset($_SESSION['formAttempt']))
		{
			unset($_SESSION['formAttempt']);
	
			if (isset($_SESSION['error'][0]))
				$titleErr = $_SESSION['error'][0];
		}else
			$titleErr = "";
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
			return false;
		}
		$query = "SELECT * FROM tags";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrive tags");
		}
		while($row = $result->fetch_assoc())
		{
			$tag = $row['tag'];
			$tagId = $row['id'];
			$option .= "<option value='$tagId'>$tag</option>";
		}

		$postForm = 
"<form id='newPostForm' action='".$baseUrl."admin/blogPost.php' method='post'>
<p class='error'>".$titleErr."</p>
<p>Title: </p><input id='post' type='text' name='title'>
<p>Post: </p><textarea name='post'></textarea>
<select id='tags'>
<option>Select a tag</option>
$option
</select>
<span id='tagArea' style='display:block;'></span>
<input id='commentSubmit' type='submit' value='Submit'>
</form>";	

		return $postForm;
	}
	
	public function editPost($postId, $baseUrl)
	{
		$postForm = $option = $tags = '';
		
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
			return false;
		}
		
		// select the blog post the user is viewing 
		$query = "SELECT * FROM blog WHERE id = '{$postId}'";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve blog post");
			return false;
		}

		//retrieve the blog post
		$row = $result->fetch_assoc();
		$postId = $row['id'];
		$date = strtotime($row['date']);
		$post = $row['post'];
		$title = $row['title'];
		$preview = $row['preview'];
		//count characters of post and preview
		$countPost = strlen($post);
		$countPreview = strlen($preview);
		//cut preview out of the post
		$post = substr($post, $countPreview, $countPost);
		//turn post into array to be imploded
		$postEdit = array();
		$postEdit[0] = $preview;	
		$postEdit[1] = $post;
		//insert preview tag by imploding the preview and post
		$post = implode("<p>&lt;!-- preview --&gt;</p>", $postEdit);
		//generate form and fill with post info
		
		$postForm = 
"<form id='updatePostForm' action='blogUpdate.php' method='post'>
<p>Title: </p><input id='postTitleUpdate' type='text' name='title' value='$title'>
<p>Post: </p><textarea id='#tinytext' name='post'>".htmlspecialchars($post)."</textarea>
<select id='tagsUpdate'>
</select>
<span id='tagAreaUpdate' style='display:block;'></span>
<span id='tagIdAreaUpdate'></span>
<input id='getPostId' type='hidden' name='postId'>
<input id='commentSubmit' type='submit' value='Submit'>
</form>
<script>
$( \"#updatePostForm\" ).on( \"submit\", function( event ) {
	event.preventDefault();
	var ed = tinymce.get('#tinytext');
	var title = $(\"#postTitleUpdate\").val();
	var post = ed.getContent();
	var tag = $(\"input[name='tagUpdate[]']\").map(function(){
		return this.value;
	}).get();
	var postId = $(\"#getPostId\").val();
	console.log( \"Title=\"+title+\"Post=\"+post+\"Tag=\"+tag+\"Post Id=\"+postId );
	$.post('blogUpdate.php',
		{
			title: title,
			post: post,
			tag: tag,
			postId: postId
		})
	.done(function(){
		$(\"#editPostDialog\").dialog(\"close\");
	})
});
</script>";
		
		return $postForm;	
	}
	
		//generate page links for default view of blog
	public function adminPostLynx($perpage, $baseUrl)
	{
		//define variable
		$lynx = '';
		
		if (isset($_POST['postPage']))
		{
			$postPage = htmlspecialchars($_POST['postPage']);
		} else
		{
			$postPage = 0;
		}
		
		if (isset($_POST['post_o']))
		{
			$postOrder = $_POST['post_o'];
		}
		else
		{
			$postOrder = "d_d";
		}
		
		//connect to database
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		// count number of blog posts
		$query = "SELECT count(id) FROM blog";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve id count");
			return false;	
		}
		$row = $result->fetch_assoc();
		//retrieve count of comments on specifict post id
		$rowCount = $row['count(id)'];
		// find the number of pages based on count of blog posts
		$pages = floor(($row['count(id)'] + $perpage - 1) / $perpage);	
		
		// generate page numbers
		for ($i=0; $i<$pages; $i++)
		{
			//if not the page that is being viewed
			if ($i != $postPage)
			{	
				$lynx .= 
"<span style='color:#0094AC; cursor:pointer;' id='postPage$i'> ".($i+1)."</span>
<script>
$(document).ready(function(){
	$('#postPage$i').click(function(){
		$.post('postAdminAjax.php',
		{
			postPage:$i,
			post_o:'$postOrder'
		},
		function(data){
			$('#tabs-1').html(data);
		});
	});
})
</script>";
			}
			else //page being viewed
			{
				$lynx .= 
" <b>".($i+1)."</b>";
			}
		}
		
		//return page link array
		return $lynx;
	}
	
		//generate page links for default view of blog
	public function adminTagsLynx($perpage, $baseUrl)
	{
		//define variable
		$lynx = '';
		
		if (isset($_POST['tagsPage']))
		{
			$tagsPage = htmlspecialchars($_POST['tagsPage']);
		} else
		{
			$tagsPage = 0;
		}
		
		if (isset($_POST['tags_o']))
		{
			$tagsOrder = $_POST['tags_o'];
		}
		else
		{
			$tagsOrder = "id_d";
		}
		
		//connect to database
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		// count number of blog posts
		$query = "SELECT count(id) FROM tags";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve id count");
			return false;	
		}
		$row = $result->fetch_assoc();
		//retrieve count of comments on specifict post id
		$rowCount = $row['count(id)'];
		// find the number of pages based on count of blog posts
		$pages = floor(($row['count(id)'] + $perpage - 1) / $perpage);	
		
		// generate page numbers
		for ($i=0; $i<$pages; $i++)
		{
			//if not the page that is being viewed
			if ($i != $tagsPage)
			{

				$lynx .= 
"<span style='color:#0094AC; cursor:pointer;' id='tagsPage$i'> ".($i+1)."</span>
<script>
$(document).ready(function(){
	$('#tagsPage$i').click(function(){
		$.post('tagsAdminAjax.php',
		{
			tagsPage:$i,
			tags_o:'$tagsOrder'
		},
		function(data){
			$('#tabs-3').html(data);
		});
	});
})
</script>";
			}
			else //page being viewed
			{
				$lynx .= "	<b>".($i+1)."</b>";
			}
		}
		
		//return page link array
		return $lynx;
	}
	
		//generate page links for default view of blog
	public function adminCommentLynx($perpage, $page, $baseUrl)
	{
		//define variable
		$lynx = '';
		
		//connect to database
		$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
		if ($mysqli->connect_errno)
		{
			error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
				return false;
		}
		// count number of blog posts
		$query = "SELECT count(id) FROM comments";
		if (!$result = $mysqli->query($query))
		{
			error_log("Cannot retrieve id count");
			return false;	
		}
		$row = $result->fetch_assoc();
		//retrieve count of comments on specifict post id
		$rowCount = $row['count(id)'];
		// find the number of pages based on count of blog posts
		$pages = floor(($row['count(id)'] + $perpage - 1) / $perpage);	
		
		// generate page numbers
		for ($i=0; $i<$pages; $i++)
		{
			//if not the page that is being viewed
			if ($i != $page)
			{
					
				if ($this->order)
					$lynx .= " <a href='".$baseUrl."admin/post_admin.php?comPage=".$i."&com_o=".$this->order."#commentAdmin'>".($i+1)."</a>";
				else	
					$lynx .= " <a href='".$baseUrl."admin/post_admin.php?comPage=".$i."#commentAdmin'>".($i+1)."</a>";
			}
			else //page being viewed
			{
				$lynx .= "	<b>".($i+1)."</b>";
			}
		}
		
		//return page link array
		return $lynx;
	}


}
?>