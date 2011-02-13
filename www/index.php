<?
error_reporting(E_ALL);

include("include/config.php");
include("include/router.php");
include("include/lib.php");
include("include/auth.php");

$router = new PHPRouter();

$router->addauth("any");   //might be logged in
$router->addauth("anon");  //must not be logged in
$router->addauth("user");  //must be logged in
$router->addauth("admin"); //must be logged in and have admin priviledges
$router->addauth("api");   //must be using a valid api key

$router->add("GET", "/",     "home.php", "home", 'any', null);
$router->add("GET", "/info", "home.php", "info", 'any',  null);

$router->addprefix("GET", "/static/", "static.php", "staticcontent", 'any', null);
$router->addprefix("GET", "/images/", "static.php", "staticimages", 'any', null);

$router->add("GET", "/login",  "account.php", "login",  'anon',  array("email" => "string", "password" => "string", "longsession" => "bool"));
$router->add("POST","/login",  "account.php", "login",  'anon',  array("email" => "string", "password" => "string", "longsession" => "bool"));
$router->add("GET", "/logout", "account.php", "logout", 'user',  null);

$router->add("GET", "/createuser",    "account.php", "createuser",    'anon',  array("email" => "string", "password" => "string"));
$router->add("POST","/createuser",    "account.php", "createuser",    'anon',  array("email" => "string", "password" => "string"));
$router->add("GET", "/activate",      "account.php", "activate",      'anon',  array("email" => "string", "key" => "string"));
$router->add("POST","/activate",      "account.php", "activate",      'anon',  array("email" => "string", "key" => "string"));
$router->add("GET", "/lostpassword",  "account.php", "lostpassword",  'anon',  array("email" => "string"));
$router->add("POST","/lostpassword",  "account.php", "lostpassword",  'anon',  array("email" => "string"));
$router->add("GET", "/resetpassword", "account.php", "resetpassword", 'anon',  array("email" => "string", "key" => "string", "newpass" => "string"));
$router->add("POST","/resetpassword", "account.php", "resetpassword", 'anon',  array("email" => "string", "key" => "string", "newpass" => "string"));

$router->add("GET", "/listprofiles",  "profile.php", "listprofiles",  'any',   null);
$router->add("GET", "/viewprofile",   "profile.php", "viewprofile",   'any',   array("id" => "int"));
$router->add("GET", "/editprofile",   "profile.php", "editprofile",   'user',  null);
$router->add("POST","/updateprofile", "profile.php", "updateprofile", 'user',  array("name" => "string", "organization" => "string", "bio" => "string"));


$router->add("GET", "/viewstep",       "step.php",    "viewstep",     'any',   array("id" => "int"));
$router->add("POST","/discussion",     "step.php",    "discussion",   'user',  array("stepid" => "int", "comment" => "string"));
$router->add("GET", "/editstep",       "step.php",    "editstep",     'user',  array("id" => "int"));
$router->add("GET", "/newstep",        "step.php",    "newstep",      'user',  null);
$router->add("POST","/createstep",     "step.php",    "createstep",   'user',  array("title" => "string", "category" => "int"));
//$router->add("POST","/updatestep",     "step.php",    "updatestep",   'user',  array("question" => "string", "category" => "int"));

$router->add("GET", "/listcategories", "categories.php", "listcategories", 'any', null);
$router->add("GET", "/viewcategory",   "categories.php", "viewcategory",   'any', array("id" => "int"));


$route = $router->route();

$user = auth(def($_COOKIE['session'], ''));
switch($route->auth){
	case 'any':
		break;

	case 'anon':
		if($user->userid)
			redirect("/");
		break;

	case 'user':
		if($user->userid == 0)
			redirect("/");
		break;

	case 'admin':
		if($user->userid == 0 || !$user->admin)
			redirect("/");
		break;

	case 'api':
		trigger_error("api authentication needs doing still...", E_USER_ERROR);

	default:
		die("This route has an unknown auth type: " . $route->auth);
}


ob_start();
if($route->file)
	require("pages/" . $route->file);
$ret = call_user_func($route->function, $route->data, $user, $route->url);
$body = ob_get_clean();

if($ret){
	include('include/skin.php');
	skin($user, $body);
}else
	echo $body;

exit;
