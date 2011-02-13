<?

function home($data, $user){
	global $db;
	$categories = $db->query("SELECT id,title FROM categories ORDER BY title")->fetchfieldset();
	include("templates/home.php");
	return true;
}

function info($data, $user){
	phpinfo();

	return false;
}

