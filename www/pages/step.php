<?
//view Question queries db for correct id, checks if the id exists, if so, checks question id against step id, returns
//all steps related to this question in an array

function viewquestion($data, $user){
	global $db;

	$step = $db->pquery("SELECT steps.*, categories.title as catname FROM steps, categories WHERE steps.category = categories.id && steps.id = ? && steps.type = 1", $data['id'])->fetchrow();

	if($step){
		$substeps = $db->pquery("SELECT steps.* FROM steps, steporder WHERE steporder.substepid = steps.id && steporder.parentstepid = ? ORDER BY priority", $data['id'])->fetchrowset();

		$db->pquery("UPDATE steps SET views = views + 1 WHERE id = ?", $step['id']);

		include("templates/viewstep.php");
	}else{
		echo "Invalid step id";
	}

	return true;
}

function newquestion($data, $user){
	global $db;

	$categories = $db->query("SELECT id,title FROM categories ORDER BY title")->fetchfieldset();
	$category = 0;
	$title = "";
	include("templates/newstep.php");
	return true;
}


function createquestion($data, $user) {
	global $db;

	if($data['title'] && $data['category']){
		$id = $db->pquery("INSERT INTO steps SET type = 1, title = ?, category = ?, userid = ?, edittime = ?", $data['title'], $data['category'], $user->userid, time())->insertid(); 
		$db->pquery("INSERT INTO stephist SET type = 1, stepid = ?, title = ?, category = ?, userid = ?, edittime = ?", $id, $data['title'], $data['category'], $user->userid, time())->insertid(); 
		redirect("/editquestion?id=$id");
		return false;
	}else{
		echo "Incomplete data";
		$category = $data['category'];
		$title = $data['title'];
		include("templates/newstep.php");
		return true;
	}
}

function editquestion($data, $user){
	global $db;

	$types = array(
		2 => "Statement",
		3 => "Link",
		4 => "Address",
		);

	$step = $db->pquery("SELECT * FROM steps WHERE id = ? && type = 1", $data['id'])->fetchrow();

	if($step){
		$discussion = $db->pquery("SELECT discussion.*, users.name as username, users.email FROM discussion, users WHERE discussion.userid = users.userid && discussion.stepid = ?", $data['id'])->fetchrowset();
		$substeps = $db->pquery("SELECT steps.* FROM steps, steporder WHERE steporder.substepid = steps.id && steporder.parentstepid = ? ORDER BY priority", $data['id'])->fetchrowset();
		$categories = $db->query("SELECT id,title FROM categories ORDER BY title")->fetchfieldset();

		$category = 0;
		$title = "";
		include("templates/editstep.php");
	}else{
		echo "Invalid step id";
	}
	
	return true;
}


function updatequestion($data, $user) {
	global $db;

	if($db->pquery("UPDATE steps SET title = ?, category = ?, userid = ?, edittime = ?  WHERE id = ?", $data['title'], $data['category'], $user->userid, time(), $data['id']))
		$db->pquery("INSERT INTO stephist SET stepid = ?, type = 1, title = ?, category = ?, userid = ?, edittime = ?", $data['id'], $data['title'], $data['category'], $user->userid, time()); 

	return true;
}

function createanswer($data, $user) {
	global $db;

	if($data['stepid'] && $data['detail']){
		$id = $db->pquery("INSERT INTO steps SET type = 2, detail = ?, userid = ?, edittime = ?", $data['detail'], $user->userid, time())->insertid(); 
		$db->pquery("INSERT INTO stephist SET type = 2, stepid = ?, detail = ?, userid = ?, edittime = ?", $id, $data['detail'], $user->userid, time())->insertid(); 

		$priority = $db->pquery("SELECT priority FROM steporder WHERE parentstepid = ? ORDER BY priority DESC LIMIT 1", $data['stepid'])->fetchrow();
		$priority = ($priority ? $priority['priority']+1 : 1);
		$db->pquery("INSERT INTO steporder SET parentstepid = ?, substepid = ?, priority = ?", $data['stepid'], $id, $priority);
	}
	redirect("/editquestion?id=$data[stepid]");
	return false;
}
function createsubquestion($data, $user) {
	global $db;

	if($data['stepid'] && $data['substepid']){
		$priority = $db->pquery("SELECT priority FROM steporder WHERE parentstepid = ? ORDER BY priority DESC LIMIT 1", $data['stepid'])->fetchrow();
		$priority = ($priority ? $priority['priority']+1 : 1);
		$db->pquery("INSERT INTO steporder SET parentstepid = ?, substepid = ?, priority = ?", $data['stepid'], $data['substepid'], $priority);
	}
	redirect("/editquestion?id=$data[stepid]");
	return false;
}

function discussion($data, $user) {
	global $db;

	$db->pquery("INSERT INTO discussion SET stepid = ?, userid = ?, time = ?, comment = ?", $data['stepid'], $user->userid, time(), $data['comment']);
	
	redirect("/editquestion?id=$data[stepid]");
	
	return false;
}

function answer($data, $user) {
	global $db;

	$unanswered = $db->pquery("SELECT steps.id, title, category FROM steps LEFT JOIN steporder ON steps.id=steporder.parentstepid WHERE steporder.parentstepid IS NULL ORDER BY steps.category")->fetchfieldset();
	
	$categories = $categories = $db->query("SELECT id,title FROM categories ORDER BY title")->fetchfieldset();
	
	include("templates/answer.php");
	
	return true;
}

function ask($data, $user) {
	global $db;
	
	include("templates/ask.php");
	
	return true;
}


