<?
//view Question queries db for correct id, checks if the id exists, if so, checks question id against step id, returns
//all steps related to this question in an array

function viewstep($data, $user) {
	global $db;
	
	if($data['id'] !== 0) {
		$step = $db->pquery("SELECT * FROM steps WHERE id = ?", $data['id'])->fetchrow();
		
		if($data['id'] !== 0) {
		
		$statement = $db->pquery("SELECT * FROM steporder WHERE parentstepid = (?) ORDER BY priority", $data['id'])->fetchrowset();
							
		include("templates/viewstep.php");
		
		}
	}
	
	else
	{
		redirect("/listcategories");
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

?>
