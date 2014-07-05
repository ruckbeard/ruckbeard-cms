<?php
require_once '../functions.inc';
$tpl = new Savant3();
$User = new User;
$Blog = new Blog;
$BlogAdmin = new BlogAdmin;
$perpage = 25;
$tags = $BlogAdmin->tagDisplay($perpage, $baseUrl); 
$lynx = $BlogAdmin->adminTagsLynx($perpage, $baseUrl);
$x=
"<div class='blog'>"
.$tags.
"<div class='pages'>"
.$lynx.
"</div>
</div>";
echo $x;
?>