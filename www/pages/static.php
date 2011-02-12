<?

function staticcontent($data, $user, $url){
	if(substr($url, 0, 8) != "/static/")
		redirect("/404?referer=$url");

	$file = substr($url, 1);

	$url = str_replace("../", "", $url);
	$url = str_replace("./", "", $url);

	if(!file_exists($file))
		redirect("/404?referer=$url");

	readfile($file);

	return false;
}

