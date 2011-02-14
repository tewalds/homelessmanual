<?

function userErrorHandler($errno, $errmsg, $filename, $linenum, $vars) {
	$errorLogging = 2;

	if(error_reporting() == 0) //likely disabled with the @ operator
		return;

	$time = gmdate("M d Y H:i:s");

// Get the error type from the error number
	static $errortype = array ( 1   => "Error",
								2   => "Warning",
								4   => "Parsing Error",
								8   => "Notice",
								16  => "Core Error",
								32  => "Core Warning",
								64  => "Compile Error",
								128 => "Compile Warning",
								256 => "User Error",
								512 => "User Warning",
								1024=> "User Notice",
								2048=> "PHP Strict",
							);
	$errlevel=$errortype[$errno];

//Write error to log file (CSV format)
	if($errno <= 128)
		$file = "logs/errors.csv";
	elseif($errno == 256)
		$file = "logs/usererrors.csv";
	else
		$file = "logs/userwarnings.csv";

	$user = "";
	$ip = "";


	$errmsg = preg_replace("/^(.*)\[<(.*)>\](.*)$/", "\\1\\3", $errmsg);

	$backoutput = "";

	if(function_exists('debug_backtrace')){
		$backtrace = debug_backtrace();

		//ignore $backtrace[0] as that is this function, the errorlogger
		
		for($i = 1; $i < 5 && $i < count($backtrace); $i++){ //only show 4 levels deep
			$errfile = (isset($backtrace[$i]['file']) ? $backtrace[$i]['file'] : '');
			
			
			$line = (isset($backtrace[$i]['line']) ? $backtrace[$i]['line'] : '');
			$function = (isset($backtrace[$i]['function']) ? $backtrace[$i]['function'] : '');
			$args = (isset($backtrace[$i]['args']) ? count($backtrace[$i]['args']) : '');
			
			$backoutput .= "$errfile:$line:$function($args)";
			
			if($i+1 < count($backtrace)) //show if there are more levels that were cut off
				$backoutput .= "<-";
		}  
	}

	$str = "\"$time\",\"$_SERVER[PHP_SELF]\",\"$user\",\"$ip\",\"$filename: $linenum\",\"($errlevel)\",\"$errmsg\",\"$backoutput\"\r\n";

	$errfile=fopen($file,"a");
	fputs($errfile,$str);
	fclose($errfile);

//Terminate script if fatal error
	if($errno != 2 && $errno != 8 && $errno != 512 && $errno != 1024 && $errno != 2048){
		if($errorLogging >= 2 || ($userData['loggedIn'] && in_array($userData['userid'], $debuginfousers)))
			die("A fatal error has occured. Script execution has been aborted:<br>\n$str");
		else
			die("A fatal error has occured. Script execution has been aborted");
	}
}

set_error_handler("userErrorHandler");

