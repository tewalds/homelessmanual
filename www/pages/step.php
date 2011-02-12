<?
//view Question queries db for correct id, checks if the id exists, if so, checks question id against step id, returns
//all steps related to this question in an array

function viewQuestion($data, $user) {
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
		redirect("/templates/category.php");
	}
}

return true;

?>

<? 

//create question function

function createquestion($data, $user) {
	global $db;
	
	include("templates/createquestion.php");
	
	$db->pquery("INSERT * INTO questions SET title = ?, date = ?, category =?", $data['title'], time(), $data['category']);
	
	return true;
}	
?>


<?

//edit question function

function editquestion($data, $user) {

$db->pquery("UPDATE questions SET title = ?, date = ?, category = ?, lastmodifiedid = ? WHERE id = ?", $data['title'], time(), $data['category'], $user->userid, $data['id']);

}

?>


