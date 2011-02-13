<?

$filetypes = array(
	".html" => "text/html",
	".css"  => "text/css",
	".js"   => "application/js",
	".png"  => "image/png",
	".jpeg" => "image/jpeg",
	".jpg"  => "image/jpg",
	".gif"  => "image/gif",
);


function staticcontent($data, $user, $url){
	global $filetypes;

	if(substr($url, 0, 8) != "/static/")
		redirect("/404?referer=$url");

	$url = str_replace("../", "", $url);
	$url = str_replace("./", "", $url);

	$file = substr($url, 1);

	if(!file_exists($file))
		redirect("/404?referer=$url");


	$fileending = substr($file, strrpos($file,'.'));

	header("Content-Type: " . $filetypes[$fileending]);

	readfile($file);

	return false;
}

function staticimages($data, $user, $url){
	global $filetypes;

	if(substr($url, 0, 8) != "/images/")
		redirect("/404?referer=$url");

	$url = str_replace("../", "", $url);
	$url = str_replace("./", "", $url);

	$file = substr($url, 1);


	if(!file_exists($file))
		redirect("/404?referer=$url");

	$fileending = substr($file, strrpos($file,'.'));
	header("Content-Type: " . $filetypes[$fileending]);

	readfile($file);

	return false;
}

