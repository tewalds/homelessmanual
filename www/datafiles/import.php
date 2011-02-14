#!/usr/bin/php
<?

if(!isset($argv[1]))
	die("Need an input file name\n");

$fd = fopen($argv[1], 'r');
if($fd === false)
	die("Error opening file $argv[1]\n");

fgetcsv($fd); //throw away the header



include("include/config.php");
include("include/lib.php");

$db->query("TRUNCATE steps");
$db->query("TRUNCATE stephist");
$db->query("TRUNCATE steporder");
$db->query("TRUNCATE discussion");


$types = array(
	"" => 1,
	"question" => 1,
	"statement" => 2,
	"location" => 3,
	"url" => 4,
	"attachment" => 4,
	);

while (($data = fgetcsv($fd)) !== FALSE){

	$row = $db->pquery("SELECT id FROM steps WHERE type = 1 && title = ?", $data[0])->fetchrow();
	if($row){
		$id = $row['id'];
		$db->pquery("UPDATE steps SET category = ? WHERE id = ?", $data[1], $id);
	}else{
		$id = $db->pquery("INSERT INTO steps SET type = 1, title = ?, category = ?", $data[0], $data[1])->insertid();
		$db->pquery("INSERT INTO stephist SET stepid = ?, title = ?, category = ?, type = 1", $id, $data[0], $data[1]);
	}

	$subtype = $types[strtolower($data[3])];
	$subid;
	if($subtype == 1){
		$row = $db->pquery("SELECT id FROM steps WHERE type = 1 & title = ?", $data[4])->fetchrow();
		if($row){
			$subid = $row['id'];
		}else{
			$subid = $db->pquery("INSERT INTO steps SET type = 1, title = ?", $data[4])->insertid();
			$db->pquery("INSERT INTO stephist SET stepid = ?, title = ?, type = 1", $subid, $data[4]);
		}
	}else{
		$subid = $db->pquery("INSERT INTO steps SET type = ?, detail = ?", $subtype, $data[4])->insertid();
		$db->pquery("INSERT INTO stephist SET stepid = ?, title = ?, type = ?", $subid, $data[4], $subtype);
	}

	$db->pquery("INSERT INTO steporder SET parentstepid = ?, substepid = ?, priority = ?",
			$id, $subid, $data[5]);
}

