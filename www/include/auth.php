<?

class User {
	public $userid;
	public $active;
	public $email;
	public $admin;

	function __construct($row = array()){
		if(empty($row)){
			$this->userid = 0;
			$this->active = 0;
			$this->email  = '';
			$this->admin  = false;
		}else{
			$this->userid = (int)$row['userid'];
			$this->active = (bool)$row['active'];
			$this->email  = $row['email'];
			$this->admin  = false;//$row['admin'];
		}
	}
}

function randkey(){
	return md5(rand() . rand() . rand() . rand() . rand());
}

function createsession($email, $password, $timeout){
	global $db;
	$row = $db->pquery("SELECT * FROM users WHERE email = ? && password = ?", $email, md5($password))->fetchrow();

	if(!$row || !$row['active'])
		return new User();

	$key = randkey();
	$db->pquery("INSERT INTO sessions SET userid = ?, sessionkey = ?, logintime = ?, activetime = ?, timeout = ?",
		$row['userid'], $key, time(), time(), $timeout);

	setcookie("session", $key, time() + $timeout);

	return new User($row);
}

function destroysession($key){
	global $db;
	$db->pquery("DELETE FROM sessions WHERE sessionkey = ?", $key);
	setcookie("session", "", time() - 100000);
	return new User();
}

function auth($key){
	global $db;

	if($key == "")
		return new User();

	$row = $db->pquery("SELECT * FROM sessions WHERE sessionkey = ?", $key)->fetchrow();
	
	if(!$row || $row['activetime'] + $row['timeout'] < time())
		return destroysession($key);

	$row = $db->pquery("SELECT * FROM users WHERE userid = ?", $row['userid'])->fetchrow();

	if(!$row) // || !$row['active'])
		return destroysession($key);

	$db->pquery("UPDATE sessions SET activetime = ? WHERE sessionkey = ?", time(), $key);

	return new User($row);
}



