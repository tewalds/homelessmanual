<?

function home($data, $user){
?>
<table><tr><td valign="top">

<h1>Welcome to the Homeless Manual</h1>
Homeless Manual is a project to streamline the process of helping the homeless. 
It is a crowd sourced manual of steps to acheive every day tasks.

</td><td>
<?
	if($user->userid == 0){
		$email = "";
		$key = "";
		$longsession = true;
		include("templates/loginform.php");
		echo "<br>";
		include("templates/createuser.php");
	}
?>
</td></tr></table>
<?
	return true;
}

function info($data, $user){
	phpinfo();

	return false;
}

