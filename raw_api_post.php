<?php
include ("test/xml_data.php");
//$default_urlPostXML =  "http://" . $_SERVER['SERVER_NAME'] . "/bbapi.php";
$default_urlPostXML =  "http://" . $_SERVER['SERVER_NAME'] . "/api/sandbox/";

/*
 * api calls are:
 * /api/submit/jjOku930uroLJKsdur093ioprjekpkfe923i/JJFIOJIEjioej9089I90FKDKKLDSKkldks/c4ca4238a0b923820dcc509a6f75849b
 * /api/<action>/<apiId>/<apiKey>/<apiRef>
 */
ini_set('memory_limit', '1500M');

if (!empty($_POST)) {
	switch($_POST['event']) {
		case "postXML":
			$ch = curl_init();
			
			$urlPostXML = $_POST['urlPostXML'] . $_POST['apiKey'] . "/" . $_POST['apiId'] . "/" . $_POST['apiRef'];
			
			if (isset($_POST['debug'])) {
				$url .= '&XDEBUG_SESSION_START=phpstorm';
			}
			
			$params = array('apiKey'=>$_POST['apiKey'], 'apiId'=>$_POST['apiId'], 'apiRef'=>$_POST['apiRef'], 'revere'=>$_POST['revere']);
			
			curl_setopt($ch, CURLOPT_URL,            $urlPostXML);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt($ch, CURLOPT_POST,           1 );
			curl_setopt($ch, CURLOPT_POSTFIELDS,     $params);
//			curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain'));
			
			$result=curl_exec ($ch);
			
			echo "<pre>";
			if (strpos($result, '<style') === false && strpos($result, '<hr>') === false) {
				echo htmlentities($result);
			} else {
				echo urldecode ($result);
			}
			echo "</pre>";
			echo '<hr />';

			break;
		case "session":
			echo "Test";
			break;
		default:
			break;
	}
} else {
	$urlPostXML = $default_urlPostXML;
	$_POST['body'] = "";
}
		
	$debug_checked = (isset($_POST['debug'])) ? ' checked="checked" ' : '';

 $apiId = 'jjOku930uroLJKsdur093ioprjekpkfe923i';
 $apiKey = 'JJFIOJIEjioej9089I90FKDKKLDSKkldks';
 $apiRef = 'c4ca4238a0b923820dcc509a6f75849b';

?>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript">
   		// we will add our javascript code here
		$(document).ready(function() {
			$("a").click(function() {
				alert("Hello world!");
			});
		});

		$('input[name=location]').click(function() {
		    alert("Selected");
		});
	</script> 
</head>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	URL: <input size="100" type="text" name="urlPostXML"
		value="<?php echo $default_urlPostXML; ?>" /> <input
		<?php echo $debug_checked?> type="checkbox" name="debug" value="1" />
	Debug<br /> 
	<div align="left"><br>
		<input type="radio" name="location" value="sandbox" checked> Sandbox<br>
		<input type="radio" name="location" value="submit">One time submission<br>
	</div>
	Body:
	<textarea rows="20" cols="100" name="revere">
		<?php if(isset($_POST['revere'])) { echo $_POST['revere']; } else { echo $xml_data; }?>
	</textarea>
		<br /> API ID:<input type="text" value="<?php if(isset($_POST['apiId'])) { echo $_POST['apiId'];} else { echo $apiId; } ?>" cols="100" name="apiId">
		<br /> API Key:<input type="text" value="<?php if(isset($_POST['apiKey'])) { echo $_POST['apiKey'];} else { echo $apiKey; } ?>" cols="100" name="apiKey">
		<br /> API Ref:<input type="text" value="<?php if(isset($_POST['apiRef'])) { echo $_POST['apiRef'];} else { echo $apiRef; } ?>" cols="100" name="apiRef">
		<br /> URL to submit to:<input type="text" value="<?php if(isset($urlPostXML)) { echo $urlPostXML;} else { echo ""; } ?>" cols="100" size="120" >
	<br /> <input type="submit"><br />
	<input type="hidden" name="event" value="postXML" />
</form>

<a href=#>test</a>

