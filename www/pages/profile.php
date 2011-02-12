<?

function viewprofile($data, $user){
	global $db;

	$u = $db->pquery("SELECT * FROM users WHERE userid = ?", $data['id'])->fetchrow();

	if($u){
		$email = $u['email'];
		$name = $u['name'];
		$organization = $u['organization'];
		$bio = $u['bio'];

		$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?&s=160"; //d=" . urlencode( $default ) . "

		$steps = $db->pquery("SELECT DISTINCT stephist.stepid, stephist.title, categories.id as catid, categories.title as catname FROM stephist, categories WHERE stephist.category = categories.id && userid = ?", $data['id'])->fetchrowset();

		include("templates/viewprofile.php");
	}else{
		echo "Invalid userid";
	}

	return true;
}

