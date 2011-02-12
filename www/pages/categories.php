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
		$steps = $db->pquery("SELECT id, title FROM steps WHERE category = ?", $data['id'])->fetchrowset();
		include("templates/viewcategory.php");
	}else{
		echo "Invalid category";
	}
	return true;
}

