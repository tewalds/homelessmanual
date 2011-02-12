<?

function skin($body){
	global $config;
?>
<html>
	<head>
		<title><?= $config['site_name'] ?></title>

<style>
tr.h, tr.f, th, td.h, td.f { background-color: #DDDDDD; }
tr.l1, td.l1   { background-color: #F7F7F7; }
tr.l2, td.l2   { background-color: #EFEFEF; }
</style>

<script type="text/javascript">
function copyInputRow(tablename, nextrow){
	var tableobj = document.getElementById(tablename);
	var numrows=tableobj.rows.length;

	var nextrow=document.getElementById(nextrow);
	var newrow= nextrow.previousSibling.cloneNode(true); //first row

	var inputs = newrow.getElementsByTagName('input');

	for(i = 0; i < inputs.length; i++)
		inputs[i].value = '';

	tableobj.tBodies[0].insertBefore(newrow, nextrow);

	return newrow;
}
</script>


	</head>
	<body>

<div>
<a href="/">Home</a> |
<a href="/logout">Logout</a>
<br><br>
</div>

<?= $body ?>

	</body>
</html>
<?
}

