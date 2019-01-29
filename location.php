<?PHP

		$website=basename($_SERVER['SCRIPT_NAME']);
		$language=substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		$browser=ExactBrowserName();
		$ip = get_ip();
		$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
		if($query && $query['status'] == 'success') 
		{
		 $location=$query['country'].', '.$query['city'];
		 $IPcountry=$query['country'];
		} 
		else {
		  $location='Unknown';
		  $IPcountry='Unknown';
		}
		if(isMobile())
		{
		 $m="mobile device ";
		}
		else
		{$m="desktop device ";}
	
 echo "your ip is ".$ip."\n your location is: ".$location." , ".$IPcountry."\n you are using a ".$m;
	





function ExactBrowserName()
{

$ExactBrowserNameUA=$_SERVER['HTTP_USER_AGENT'];

if (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")) {
    // OPERA
    $ExactBrowserNameBR="Opera";
} elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "chrome/")) {
    // CHROME
    $ExactBrowserNameBR="Chrome";
} elseIf (strpos(strtolower($ExactBrowserNameUA), "msie")) {
    // INTERNET EXPLORER
    $ExactBrowserNameBR="Internet Explorer";
} elseIf (strpos(strtolower($ExactBrowserNameUA), "firefox/")) {
    // FIREFOX
    $ExactBrowserNameBR="Firefox";
} elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")==false and strpos(strtolower($ExactBrowserNameUA), "chrome/")==false) {
    // SAFARI
    $ExactBrowserNameBR="Safari";
} else {
    // OUT OF DATA
    $ExactBrowserNameBR="OUT OF DATA";
};

return $ExactBrowserNameBR;
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}



function get_ip() {

		//Just get the headers if we can or else use the SERVER global
		if ( function_exists( 'apache_request_headers' ) ) {

			$headers = apache_request_headers();

		} else {

			$headers = $_SERVER;

		}

		//Get the forwarded IP if it exists
		if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {

			$the_ip = $headers['X-Forwarded-For'];

		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) {

			$the_ip = $headers['HTTP_X_FORWARDED_FOR'];

		} else {
			
			$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );

		}

		return $the_ip;

	}

?>