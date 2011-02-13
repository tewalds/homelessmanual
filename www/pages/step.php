<?
//view Question queries db for correct id, checks if the id exists, if so, checks question id against step id, returns
//all steps related to this question in an array

function viewstep($data, $user){
	global $db;

	$step = $db->pquery("SELECT steps.*, categories.title as catname FROM steps, categories WHERE steps.category = categories.id && steps.id = ?", $data['id'])->fetchrow();

	if($step){
		$substeps = $db->pquery("SELECT steps.* FROM steps, steporder WHERE steporder.substepid = steps.id && steporder.parentstepid = ? ORDER BY priority", $data['id'])->fetchrowset();
		$discussion = $db->pquery("SELECT discussion.*, users.name as username, users.email FROM discussion, users WHERE discussion.userid = users.userid && discussion.stepid = ?", $data['id'])->fetchrowset();

		include("templates/viewstep.php");
	}else{
		echo "Invalid step id";
	}

	return true;
}

//start of editstep function

function editstep($data, $user) {

$db->pquery("UPDATE questions SET title = ?, date = ?, category = ?, lastmodifiedid = ? WHERE id = ?", $data['title'], time(), $data['category'], $user->userid, $data['id']);


return true;

}

function newstep($data, $user) {

	$db->pquery("INSERT INTO steps SET title = ?, date = ?, category = ?, creatorid = ?, lastmodifiedid = ?", $data['title'], time(), $data['category'], $user['id']); 

	redirect("/editstep");
}

