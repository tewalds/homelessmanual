<?

function skin($user, $body){
	global $config;

	$email = "";
	$key = "";
	$longsession = true;

	$menu = array();
	$menu["Home"] = "/";
	$menu["Ask A Question"] = "/ask";
	$menu["Answer Questions"] = "/answer";
	$menu["Add Questions"] = "/newstep";
	$menu["Users"] = "/listprofiles";

	if($user->userid){
		$menu["My Profile"] = "/viewprofile?id=" . $user->userid;
		$menu["Logout"] = "/logout";
	}else{
		$menu["Login"] = "/login";
	}

	include("templates/skin.php");
}

