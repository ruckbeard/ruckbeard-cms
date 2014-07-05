<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title><?php echo $this->eprint($this->title); ?></title>
<link href="http://127.0.0.1/ruckbeard/blog.css" rel="stylesheet" type="text/css">
<link href="http://127.0.0.1/ruckbeard/css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="http://127.0.0.1/ruckbeard/js/jquery-1.10.2.js"></script>
<script src="http://127.0.0.1/ruckbeard/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="http://127.0.0.1/ruckbeard/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "textarea",
    theme: "modern",
    width: 600,
    height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
 }); 
</script>
<script>
tinymce.init({
    selector: "#tinytext",
    theme: "modern",
    width: 600,
    height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
 }); 
</script>
<script>
$(document).ready(function(){
	$("#tags").change(function(){ 
		var str = "";
		var id = "";
		var text = "";
    	$("#tags option:selected").each(function() {
			text += $( this ).text();
			text = htmlspecialchars(text);
			id += $( this ).val();
    		str += text + "&nbsp;<span class='"+id+"' id='"+text+"'><span id=\"closeIcon\" class=\"ui-icon ui-icon-circle-close\" style=\"display: inline-block;cursor:pointer;\"></span></span>";
    	});
		$("#tagArea").append('<span class="tag">'+str+'</span>');
		$("#newPostForm").append("<input id='tag"+id+"' type='hidden' name='tag[]' value='"+id+"'>");
		$("#tags option:selected").remove();
	});
	
	$("#tagsUpdate").change(function(){ 
		var id = "";
		var text = "";
		var n = "";
		var str = "";
		var postId = $("input[name='postId']").val();
    	$("#tagsUpdate option:selected").each(function() {
			text = $( this ).text();
			id = $( this ).val();
    	});
		$.post('editPostTags.php', {addTagText: text, addTagId: id},
		function(data) {
			str = data;
			n = str.split("<!++separator++>");
			for(i=0;i<n.length;i++)
			{
				if(n[i].match("<span class='tag'>"))
				{
					$("#tagAreaUpdate").append(n[i]);
				}
				else
				{
					$("#tagIdAreaUpdate").append(n[i]);
				}
			}
		});
		$("#tagsUpdate option:selected").remove();
	});
	
	$(document).on("click", "#closeIcon", function(){
		var text = $(this).parent().attr("id");
		var id = $(this).parent().attr("class");
		$("#tag"+id).remove();
		$("#tags").append("<option value='"+id+"'>"+text+"</option>");
		$(this).parent().parent().remove();
		$("#tag"+id).remove();	
	});
	
	$(document).on("click", "#closeIcon", function(){
		var id = $(this).parent().attr("class");
		var postId = $("input[name='postId']").val();
		$("#tag"+id).remove();
		$("#tag"+id).remove();
		$.post('http://127.0.0.1/ruckbeard/admin/editPostOption.php', {postId: postId, tagId: id},
		function(data) {
			$("#tagsUpdate").append(data);
		});
		$(this).parent().parent().remove();
	});
	
	$.post("postAdminAjax.php",
	{
		postPage:0,
		post_o:"d_d"
	},
	function(data){
		$("#tabs-1").html(data);
	});
	
	$.post("tagsAdminAjax.php",
	{
		postPage:0,
		post_o:"id_d"
	},
	function(data){
		$("#tabs-3").html(data);
	});
	function htmlspecialchars(str) {
		if (typeof(str) == "string") {
			str = str.replace(/&/g, "&amp;");  /*must do &amp; first */
			str = str.replace(/"/g, "&quot;");
			str = str.replace(/'/g, "&#039;");
			str = str.replace(/</g, "&lt;");
			str = str.replace(/>/g, "&gt;");
		}
		return str;
	}
	function rhtmlspecialchars(str) {
		if (typeof(str) == "string") {
			str = str.replace(/&gt;/ig, ">");
			str = str.replace(/&lt;/ig, "<");
			str = str.replace(/&#039;/g, "'");
			str = str.replace(/&quot;/ig, '"');
			str = str.replace(/&amp;/ig, '&'); /* must do &amp; last */
			}
		return str;
	}
});
</script>
</head>

<body style="position: relative; min-height: 100%; top: 0px;">
<div id="deletePost" title="Delete Post"><p style='font-size:.8em;'><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete this post?</p></div>
<div id="deleteTag" title="Delete Tag"><p style='font-size:.8em;'><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete this tag?</p></div>
<div id="deleteComment" title="Delete Tag"><p style='font-size:.8em;'><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete this comment?</p></div>
<div id="deleteAllPost" title="Delete All Posts"><p style='font-size:.8em;'><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete the selected posts?</p></div>
<div id="deleteAllTag" title="Delete All Tags"><p style='font-size:.8em;'><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete the selected tags?</p></div>
<div id="deleteAllComment" title="Delete All Tags"><p style='font-size:.8em;'><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete the selected comments?</p></div>
<div id="viewPost" title="Viewing Post"></div>
<div id="viewTag" title="Viewing Tagged Posts"></div>
<div id="editPostDialog" title="Edit Post"><?php echo $this->eprint($this->postForm); ?></div>
<div id="newPostDialog" title="New Post"><?php echo $this->eprint($this->newPostForm); ?></div>
<div id="newTagsDialog" title="New Tags"><?php echo $this->eprint($this->tagForm); ?></div>
<div id="viewComment" title="Viewing Comment"></div>
<div class="header"></div>
<div class="blogContainer_admin">
<div id="tabs" style='width: 1160px; margin:0 auto;'>
<ul>
<li><a href="#tabs-1">Post Admin</a></li>
<li><a href="#tabs-3">Tags Admin</a></li>
<li><a href="#commentAdmin">Comment Admin</a></li>
</ul>
<div id="tabs-1">
</div>
<div id="tabs-3">
</div>
<div id="commentAdmin">
<div class="blog">
<?php if (is_array($this->commentDisplay)): ?>
<?php foreach ($this->commentDisplay as $key => $val): ?>
<?php echo $this->eprint($val); ?>
<?php endforeach; ?>
<?php endif; ?>
<div class="pages">
<?php echo $this->eprint($this->commentLynx); ?>
</div>
</div>
</div>
</div>
</div>
<div class="footer"></div>
<script>
$(function() {
	$( "#deletePost" ).dialog({
		autoOpen: false,
		width: 400,
		modal: true,
		buttons: [
			{
				text: "Yes",
				click: function() {
					var postId = $( this ).data("postId");
					$.post('http://127.0.0.1/ruckbeard/admin/delete.php', {postId: postId})
					.done(function(){
						$("#tableRow"+postId).remove();
					})
					$( this ).dialog( "close" );
				}
			},
			{
				text: "Cancel",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
		]
	});
		
	$( "#deleteTag" ).dialog({
		autoOpen: false,
		width: 400,
		modal: true,
		buttons: [
			{
				text: "Yes",
				click: function() {
					var tagId = $( this ).data("tagId");
					$.post('http://127.0.0.1/ruckbeard/admin/delete.php', {tagId: tagId})
					.done(function(){
						refreshTags();
					})
					$( this ).dialog( "close" );
				}
			},
			{
				text: "Cancel",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
			]
	});
	
	$( "#deleteComment" ).dialog({
		autoOpen: false,
		width: 400,
		modal: true,
		buttons: [
			{
				text: "Yes",
				click: function() {
					var comId = $( this ).data("comId");
					$.post('http://127.0.0.1/ruckbeard/admin/delete.php', {comId: comId})
					.done(function(){
						$("#comTableRow"+comId).remove();
					})
					$( this ).dialog( "close" );
				}
			},
			{
				text: "Cancel",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
			]
	});
 
	$( "#deleteAllPost" ).dialog({
		autoOpen: false,
		width: 400,
		modal: true,
		buttons: [
			{
				text: "Yes",
				click: function() {
					var id = $( this ).data("id");
					$.post('http://127.0.0.1/ruckbeard/admin/deleteAll.php', {postId: id})
					.done(function(){
						$("#tableRow"+postId).remove();
					})
					$( this ).dialog( "close" );
				}
			},
			{
				text: "Cancel",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
		]
	});
		
	$( "#deleteAllTag" ).dialog({
		autoOpen: false,
		width: 400,
		modal: true,
		buttons: [
			{
				text: "Yes",
				click: function() {
					var id = $( this ).data("id");
					$.post('http://127.0.0.1/ruckbeard/admin/deleteAll.php', {tagId: id})
					.done(function(){
						refreshTags();
					})
					$( this ).dialog( "close" );
				}
			},
			{
				text: "Cancel",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
		]
	});
	
	$( "#deleteAllComment" ).dialog({
		autoOpen: false,
		width: 400,
		modal: true,
		buttons: [
			{
				text: "Yes",
				click: function() {
					var id = $( this ).data("id");
					$.post('http://127.0.0.1/ruckbeard/admin/deleteAll.php', {comId: id})
					.done(function(){
						$("#comtTableRow"+comId).remove();
					})
					$( this ).dialog( "close" );
				}
			},
			{
				text: "Cancel",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
		]
	});
	
	$( "#viewPost" ).dialog({
		autoOpen: false,
		width: 900,
		height: 800,
		modal: true
	});
	
	$( "#editPostDialog" ).dialog({
		autoOpen: false,
		width: 900,
		height: 800,
		modal: true,
		close: function() {
			$("#tagAreaUpdate").empty();
			$("#tagIdAreaUpdate").empty();	
		}
	});
	
	$( "#newPostDialog" ).dialog({
		autoOpen: false,
		width: 900,
		height: 800,
		modal: true
	});
	
	$( "#viewTag" ).dialog({
		autoOpen: false,
		width: 900,
		height: 800,
		modal: true
	});
	
	$( "#newTagsDialog" ).dialog({
		autoOpen: false,
		width: 400,
		height: 400,
		modal: true
	});
	
	$( "#viewComment" ).dialog({
		autoOpen: false,
		width: 900,
		height: 400,
		modal: true
	});
	
	$( "#tabs" ).tabs();
});
</script>
</body>
</html>