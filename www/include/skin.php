<?

function skin($user, $body){
	global $config;

	$email = "";
	$key = "";
	$longsession = true;

	$menu = array();
	$menu["Home"] = "/";
	$menu["Users"] = "/listprofiles";
	$menu["Ask A Question"] = "/ask";
	$menu["Answer Questions"] = "/answer";

	if($user->userid){
		$menu["My Profile"] = "/viewprofile?id=" . $user->userid;
		$menu["Logout"] = "/logout";
	}else{
		$menu["Login"] = "/login";
	}

	include("templates/skin.php");
}

