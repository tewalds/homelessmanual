<?

function def( & $var, $def){
	return (isset($var) ? $var : $def);
}

class PHPRouter {
	public $paths;
	public $prefixes;
	public $errors;
	public $auths;

	function __construct(){
		$this->paths = array("GET" => array(), "POST" => array());
		$this->prefixes = array("GET" => array(), "POST" => array());
		$this->errors = array("404" => array($this, "fourohfour"));
		$this->auths = array();
	}

	function addauth($type){
		$this->auths[$type] = $type;
	}

	function add($type, $url, $file, $function, $auth, $inputs){
		if(!isset($this->auths[$auth]))
			die("Unknown auth type $auth\n");
		$this->paths[$type][$url] = new PathNode($type, $url, $file, $function, $auth, $inputs);
	}

	function addprefix($type, $url, $file, $function, $auth, $inputs){
		if(!isset($this->auths[$auth]))
			die("Unknown auth type $auth\n");
		$this->prefixes[$type][$url] = new PathNode($type, $url, $file, $function, $auth, $inputs);
	}

	function route(){
		$type = $_SERVER['REQUEST_METHOD'];
		$uri  = $_SERVER['REQUEST_URI'];

		$url = explode('?', $uri, 2);
		$url = strtolower($url[0]);

		if(isset($this->paths[$type][$url])){
			$node = $this->paths[$type][$url];
		}else{
			$node = null;
			foreach($this->prefixes[$type] as $prefix){
				if(substr($url, 0, strlen($prefix->url)) == $prefix->url){
					$node = $prefix;
					break;
				}
			}
			if($node == null)
				return new Route(null, $this->errors["404"], 'any', null, $url);
		}

		$data = array();
		if(is_array($node->inputs)){
			$source = ($type == "GET" ? $_GET : $_POST);

			foreach($node->inputs as $k => $v)
				$data[$k] = $this->validate($source, $k, $v);
		}

		return new Route($node->file, $node->function, $node->auth, $data, $url);
	}

	function validate($source, $key, $type){
		if(is_array($type)){
			$origtype = $type;
			$default = $type[1];
			$type = $type[0];
		}

		switch($type){
			case "int":
			case "integer":
			case "bool":
			case "boolean":
			case "float":
			case "double":
			case "string":
				if(isset($source[$key])){
					$ret = $source[$key];

					if(settype($ret, $type))
						return $ret;
				}
				if(!isset($default)){
					$default = null;
					settype($default, $type);
				}
				return $default;
			
			case "array":
				if(isset($source[$key])){
					$ret = $source[$key];

					if(settype($ret, 'array')){
						if(isset($origtype) && isset($origtype[2])){
							$type = $origtype[2];

							foreach($ret as $k => $v){
								$ret[$k] = $this->validate($ret, $k, array($type, null));
								if($ret[$k] === null)
									unset($ret[$k]);
							}
						}

						return $ret;
					}
				}
				return def($default, array());

			case "file":
				return def($_FILES[$key], null);

			default:
				die("Unknown validation type: $type\n");
		}
	}

	function fourohfour($data, $user, $url){
		echo "404 - page not found!<br/>" . htmlentities($url);
	}
}

class PathNode {
	public $type;
	public $url;
	public $file;
	public $function;
	public $auth;
	public $inputs;

	function __construct($type, $url, $file, $function, $auth, $inputs){
		$this->type = $type;
		$this->url = $url;
		$this->file = $file;
		$this->function = $function;
		$this->auth = $auth;
		$this->inputs = $inputs;
	}
}

class Route {
	public $file;
	public $function;
	public $auth;
	public $data;
	public $url;

	function __construct($file, $function, $auth, $data, $url){
		$this->file = $file;
		$this->function = $function;
		$this->auth = $auth;
		$this->data = $data;
		$this->url = $url;
	}
}
