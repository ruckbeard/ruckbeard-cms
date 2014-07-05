<!doctype html>
<html>
<head>
<base href="/ruckbeard/" />
<meta charset="utf-8">
<title><?php echo $this->eprint($this->title); ?></title>
<link href="blog.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.css" rel="stylesheet" type="text/css">
<!--<link href="jQueryAssets/jquery.ui.dialog.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.resizable.min.css" rel="stylesheet" type="text/css">-->
<script src="jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery-ui-1.9.2.dialog.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
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
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
 }); 
</script>
</head>
<body style="position: relative; min-height: 100%; top: 0px;">
<div class="header"></div>
<div class="container">
<div class="blogContainer_admin">     
<div id="blogSkeleton">
<?php if (is_array($this->tagTable)): ?>
<div class='blog_list'>
<?php foreach ($this->tagTable as $key => $val): ?>
<?php echo $this->eprint($val); ?>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div> 
<div class="pages">
<?php echo $this->eprint($this->lynx); ?>
<div id="dialog" title="Delete Post">
<p style='font-size:.8em;'><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete this tag?</p>
</div>
<div id="dialog2" title="Delete Post">
<p style='font-size:.8em;'><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete the selected tags?</p>
</div>
</div>
</div>
</div>
<div class="footer"></div>
<script>
$(function() {
	$("#dialog").dialog({
		autoOpen: false,
		resizable: false,
		height:160,
		modal: true,
		buttons: {
			"Yes": function() {
				var tagId = $( this ).data("tagId");
				$.post('admin/delete.php', {tagId: tagId})
				.done(function(){location.reload()})
			},
			Cancel: function() {
				$( this ).dialog( "close" );
			}
		}
	});
});
  
$(function() {
	$("#dialog2").dialog({
		autoOpen: false,
		resizable: false,
		height:160,
		modal: true,
		buttons: {
			"Yes": function() {
				var id = $( this ).data("id");
				$.post('admin/deleteAll.php', {tagid: id})
				.done(function(){location.reload()})
			},
			Cancel: function() {
				$( this ).dialog( "close" );
			}
		}
	});
});

</script>
</body>
</html>