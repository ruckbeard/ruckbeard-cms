<?php
require_once '../functions.inc';
$tpl = new Savant3();
$User = new User;
$Blog = new Blog;
$BlogAdmin = new BlogAdmin;
$perpage = 25;
$blogPosts = $BlogAdmin->multiPost($perpage, $baseUrl); 
$lynx = $BlogAdmin->adminPostLynx($perpage, $baseUrl);
$x=
"<div class='blog'>"
.$blogPosts.
"<div class='pages'>"
.$lynx.
"</div>
</div>";
echo $x;
?>