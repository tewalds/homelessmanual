<?

function skin($user, $body){
	global $config;

	$email = "";
	$key = "";
	$longsession = true;

	$menu = array();
	$menu["Home"] = "/";

	if($user->userid)
		$menu["Logout"] = "/logout";

	include("templates/skin.php");
}

