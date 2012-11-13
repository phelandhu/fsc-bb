<?php
// test.php
/***********************************************
* Created:            Nov 12, 2012 10:51:55 AM
* Last Modified:      Nov 12, 2012 10:51:55 AM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

$URL = "http://" . $_SERVER['SERVER_NAME'] . "/bbapi.php?";

function post_xml($url, $xml) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_USERPWD, 'test:test');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array('apipassword'=>'test','apiusername'=>'test','apikey'=>'I5uHFVhfKGWpdXOr','revere'=>$xml));
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

	$result = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	//echo($info['request_header']);

	return $result;
}

if(isset($_POST["api_test"])) {
	switch ($_POST["api_test"]) {
		case 0: // API login test
			echo "woohoo";
			break;
		case 1:
			break;
		case 2:
			break;
		case 3:
			break;
		default:
			echo "Incorrect test selected";
			break;
	}
	
	print_r($_POST);	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
		<head> 
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /> 
		<title>API Test Page</title> 
	</head> 
	<body>
		<h1>API Login Test</h1>
		<form method="post" action="<?php echo $PHP_SELF;?>">
			<input type="text" name="userName" /><br />
			<input type="text" name="apiKey" /><br />
			<input type=submit /><br />
			<input type=hidden name="api_test" value="0" />
		</form>
	</body> 
</html>