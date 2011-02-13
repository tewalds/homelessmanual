<?

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
		$userid = $u['userid'];
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
	global $db;

	$u = $db->pquery("SELECT * FROM users WHERE userid = ?", $user->userid)->fetchrow();
	include("templates/editprofile.php");
	return true;
}

function updateprofile($data, $user){
	global $db;

	$db->pquery("UPDATE users SET name = ?, organization = ?, bio = ? WHERE userid = ?", $data['name'], $data['organization'], $data['bio'], $user->userid);

	redirect("/viewprofile?id=" . $user->userid);
	return false;
}

