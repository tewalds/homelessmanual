<?

function skin($user, $body){
	global $config;

	$email = "";
	$key = "";
	$longsession = true;

	$menu = array();
	$menu["Home"] = "/";
	$menu["Users"] = "/listprofiles";
	$menu["Login"] = "/login";

	if($user->userid)
		$menu["Logout"] = "/logout";

	include("templates/skin.php");
}

