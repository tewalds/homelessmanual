<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?= $config['site_name'] ?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="/static/default.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/static/basic.js"></script>

<!-- Autocomplete -->
  <script src="/static/js/jquery-1.4.4.min.js"></script>
  <script src="/static/js/jquery-ui-1.8.9.custom.min.js"></script>
  <link rel="stylesheet" href="/static/css/ui-lightness/jquery-ui-1.8.9.custom.css" type="text/css" />
<!-- END Autocomplete -->

</head>
<body>
<div id="wrapper">
<!-- start header -->
<div id="logo">
	<h1><a href="#"><img src="/images/helpinglogo.png"></a></h1>
</div>
<div id="header">
	<div id="menu">
		<ul>
<?
$i = 0;
foreach($menu as $name => $link)
	echo "<li" . (++$i == count($menu) ? "class='current_page_item'" : "") . "><a href='$link'>$name</a></li>";
?>
		</ul>
	</div>
</div>
<!-- end header -->
</div>
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
<?= $body ?>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<ul>
<?
	if($user->userid == 0){
		echo "<li>";
		include("templates/loginform.php");
		echo "</li><li>";
		include("templates/createuser.php");
		echo "</li>";
	}
?>
			<li id="search">
				<h2>Search</h2>
				<form method="get" action="">
					<fieldset>
					<input type="text" id="s" name="s" value="" />
					<input type="submit" id="x" value="Search" />
					</fieldset>
				</form>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p id="legal">( c ) 2008. All Rights Reserved. <a href="http://www.freecsstemplates.org/">Bestfriends</a> designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
<!-- end footer -->
</body>
</html>
