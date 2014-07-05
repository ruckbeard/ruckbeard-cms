<?php
require_once('../functions.inc');
$tpl = new Savant3();
$User = new User;
$Blog = new Blog;
$BlogAdmin = new BlogAdmin;

$name = "Create New Tags";
$postForm = $login = $tagErr = "";

if (isset($_SESSION['error']) && isset($_SESSION['formAttempt']))
{
	unset($_SESSION['formAttempt']);
	
	if (isset($_SESSION['error'][0]))
		$titleErr = $_SESSION['error'][0];
}

$login = $Blog->loginForm($User->isLoggedIn, curPageURL(), $baseUrl);

$tagForm = 
"<form action='".$baseUrl."admin/tagsCreate.php' method='post'>
<p>Tag: <input type='text' name='tag[]'></p>
<p>Tag: <input type='text' name='tag[]'></p>
<p>Tag: <input type='text' name='tag[]'></p>
<p>Tag: <input type='text' name='tag[]'></p>
<p>Tag: <input type='text' name='tag[]'></p>
<span id='append'></span>
<input type='submit' value='Submit'>
</form>
<span id='addInputs' style='color:#0094AC; cursor:pointer;'>Add More Tags</span>
<script>
$(document).ready(function(){
  $(\"#addInputs\").click(function(){
    $(\"#append\").append(\"<p>Tag: <input type='text' name='tag[]'></p>\");
  });
});
</script>
";

$tpl->name = $name;
$tpl->tagForm = $tagForm;
$tpl->login = $login;

$tpl->display('tagsAdmin_create.tpl.php');
?>