<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?= $config['site_name'] ?></title>
	<meta name="keywords" content="Edmonton, Homeless, Affordable Housing" />
	<meta name="description" content="A guide for homeless and affordable housing." />
	<link href="/static/default.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/static/basic.js"></script>

<!-- Autocomplete -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.js"></script>
    <script src="http://view.jquery.com/trunk/plugins/autocomplete/jquery.autocomplete.js"></script>
  <link rel="stylesheet" href="http://view.jquery.com/trunk/plugins/autocomplete/jquery.autocomplete.css" type="text/css" />
<!-- END Autocomplete -->

</head>
<body>
<div id="wrapper">
<!-- start header -->
<div id="logo">
	<a href="/"><img src="/images/helpinglogo.png"></a>
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
	<div id="content">
<?= $body ?>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
</div>
<!-- end footer -->
</body>
</html>
