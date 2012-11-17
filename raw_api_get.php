<?php
/*

A script allowing quick POST's to the game management API.

Cantor specific for now, as they're the only ones using that API.

*/

$default_url = "http://http://localhost/wagerplayer/admin/wapi1.php?wapi_client_user=cantor&wapi_client_pass=977f4f740a9fe91de93a6ce06a156920";
$default_body = "&output_type=xml
&action=bet_place_bet
&session_id=c1123d92fce0b00694eb6fb8eb83ae93
&mpid=724
&win_price=1.75
&amount=10
&pt=1
&bt=1
&external_bet_id=4244";

ini_set('memory_limit', '1500M');

if (!empty($_POST)) {
	$ch = curl_init();
	
	$url = $_POST['url'];
	$body = $_POST["body"];
	
	if (isset($_POST['debug'])) {
		$url .= '&XDEBUG_SESSION_START=phpstorm';
	}

	curl_setopt($ch, CURLOPT_URL,            $url . $body);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
//	curl_setopt($ch, CURLOPT_GET,           1 );
//	curl_setopt($ch, CURLOPT_POSTFIELDS,     $_POST['body'] ); 
	curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

	$result=curl_exec ($ch);

	echo "<pre>";
	if (strpos($result, '<style') === false && strpos($result, '<hr>') === false) {
		echo htmlentities($result);
	} else {
		echo $result;
	}
	echo "</pre>";
	echo '<hr />';
	
} else {
 	$_POST['url'] = $default_url;
	$_POST['body'] = $default_body;
}

$debug_checked = (isset($_POST['debug'])) ? ' checked="checked" ' : '';

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
URL: <input size="100" type="text" name="url" value="<?php echo $_POST['url']; ?>"/> <input <?php echo $debug_checked?> type="checkbox" name="debug" value="1" /> Debug<br />
Body: <textarea rows="20" cols="100" name="body"><?php echo $_POST['body']?></textarea><br />
<input type="submit"><br />
</form>

