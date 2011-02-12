<?

function skin($user, $body){
	global $config;

	$email = "";
	$key = "";
	$longsession = true;

	$menu = array();
	$menu["Home"] = "/";
	$menu["Users"] = "/listprofiles";

	if($user->userid){
		$menu["My Profile"] = "/viewprofile?id=" . $user->userid;
		$menu["Edit Profile"] = "/editprofile";
		$menu["Logout"] = "/logout";
	}

	include("templates/skin.php");
}

