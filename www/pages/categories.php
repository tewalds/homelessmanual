<?

function listcategories($data, $user){
	global $db;

	$categories = $db->query("SELECT id, title FROM categories ORDER BY title")->fetchrowset();
	include("templates/listcategories.php");
	return true;
}

function viewcategory($data, $user){
	global $db;

	$category = $db->pquery("SELECT * FROM categories WHERE id = ?", $data['id'])->fetchrow();
	
	if($category){
		$steps = $db->pquery("SELECT id, title FROM steps WHERE category = ? && type = 1 ORDER BY `views`", $data['id'])->fetchrowset();
		include("templates/viewcategory.php");
	}else{
		echo "Invalid category";
	}
	return true;
}

function searchsteps($data, $user){
	global $db;

	$s = $data['q'];
	if(!$s && $data['s'])
		$s = $data['s'];
	if(!$s && $data['term'])
		$s = $data['term'];

	$row = $db->pquery("SELECT id FROM steps WHERE title = ?", $s)->fetchrow();
	if($row){
		redirect("viewquestion?id=$row[id]");
		return false;
	}

	$steps = $db->pquery("SELECT id, title FROM steps WHERE title LIKE ? ORDER BY `views` DESC LIMIT 20", "%$s%")->fetchrowset();

	if($data['ajax']){
		foreach($steps as $step)
			echo "$step[id] $step[title]\n";
		return false;
	}else{
		include("templates/liststeps.php");
		return true;
	}
}


