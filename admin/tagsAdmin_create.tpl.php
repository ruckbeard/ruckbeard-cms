<!DOCTYPE html>
<head>
<base href="/ruckbeard/" />
<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script src="jquery-1.11.0.min.js"></script>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->eprint($this->name); ?></title>
<link href="blog.css" rel="stylesheet" type="text/css">
</head>

<body style="position: relative; min-height: 100%; top: 0px;">
	<div class="header"></div>
    <div class="container">
    	<div class="sidebar"><?php echo $this->eprint($this->login); ?></div>
    	<div class="blogContainer">
    	<?php echo $this->eprint($this->tagForm); ?>
        </div>
        
    </div>
    <div class="footer"></div>
</body>
</html>