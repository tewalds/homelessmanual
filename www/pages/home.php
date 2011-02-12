<?

function home($data, $user){
	include("templates/home.php");
	return true;
}

function info($data, $user){
	phpinfo();

	return false;
}

