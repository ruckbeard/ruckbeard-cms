<!DOCTYPE html>
<html>
<head>
<base href="/ruckbeard/" />
<!-- Place inside the <head> of your HTML -->
<title><?php echo $this->eprint($this->title); ?></title>
<link href="blog.css" rel="stylesheet" type="text/css">
<link href="http://127.0.0.1/ruckbeard/css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="http://127.0.0.1/ruckbeard/js/jquery-1.10.2.js"></script>
<script src="http://127.0.0.1/ruckbeard/js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="http://127.0.0.1/ruckbeard/tinymce/tinymce.min.js"></script>
<script>
$(function() {
    $( document ).tooltip();
});
(function(doc, script) {
  var js, 
      fjs = doc.getElementsByTagName(script)[0],
      frag = doc.createDocumentFragment(),
      add = function(url, id) {
          if (doc.getElementById(id)) {return;}
          js = doc.createElement(script);
          js.src = url;
          id && (js.id = id);
          frag.appendChild( js );
      };
      
    // Google+ button
    add('http://apis.google.com/js/plusone.js');
    // Twitter SDK
    add('//platform.twitter.com/widgets.js');

    fjs.parentNode.insertBefore(frag, fjs);
}(document, 'script'));
</script>
</head>
<body style="position: relative; min-height: 100%; top: 0px;">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=231319646991764";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="header"> </div>
<div class="container"> <!-- container for all content -->
<div class="sidebar"><!-- sidebar for extras -->
<?php echo $this->eprint($this->login); ?>
<?php echo $this->eprint($this->archive); ?>
</div><!-- end sidebar -->
<div class="blogContainer"><!-- Contain blog posts -->
<div id="blogSkeleton"><!-- keep pages at bottom of blogContainer -->
<div class='blog'>
<?php if ($this->blog): ?>
<?php echo $this->eprint($this->blog); ?>
</div><!-- end blog -->
<?php else: ?>
<p id="noPosts">There are no posts to display.</p>
<?php endif; ?>
<div class="pages"><!-- pagination links -->
<?php echo $this->eprint($this->lynx); ?>
</div> <!-- end pages -->
</div>  <!-- end blog skeleton -->
</div> <!-- end blog container -->
</div> <!-- end container -->
<div class="footer"><p>Copyright 2014 | Kevin VanderWulp | Ruckbeard.com</div>
</body>
</html>