<?

function gravurl($email){
	return "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?&s=160"; //d=" . urlencode( $default ) . "	
}

function listprofiles($data, $user){
	global $db;

	$users = $db->pquery("SELECT * FROM users ORDER BY name")->fetchrowset();

	include("templates/listprofiles.php");
	return true;
}

function viewprofile($data, $user){
	global $db;

	$u = $db->pquery("SELECT * FROM users WHERE userid = ?", $data['id'])->fetchrow();

	if($u){
		$email = $u['email'];
		$name = $u['name'];
		$organization = $u['organization'];
		$bio = $u['bio'];

		$steps = $db->pquery("SELECT DISTINCT stephist.stepid, stephist.title, categories.id as catid, categories.title as catname FROM stephist, categories WHERE stephist.category = categories.id && userid = ?", $data['id'])->fetchrowset();

		include("templates/viewprofile.php");
	}else{
		echo "Invalid userid";
	}

	return true;
}

function editprofile($data, $user){

}

