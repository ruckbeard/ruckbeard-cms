<!DOCTYPE html>
<head>
<!-- Place inside the <head> of your HTML -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->eprint($this->name); ?></title>
<link href="blog.css" rel="stylesheet" type="text/css">
</head>

<body style="position: relative; min-height: 100%; top: 0px;">
	<div class="header"></div>
    <div class="container">
    	<div class="sidebar"><?php echo $this->eprint($this->login); ?></div>
    	<div class="blogContainer">
    	<?php echo $this->eprint($this->regForm); ?>
        </div>
    </div>
    <div class="footer"></div>
</body>
</html>
