<?php
// subTest.php.php
/***********************************************
* Created:            Nov 2, 2012 3:16:46 PM
* Last Modified:      Nov 2, 2012 3:16:46 PM
*
* Test of the insert API
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
$id = "xxx444xxx";
$pw = "432asdf";
$default_url = sprintf("http://fsc-bb/api.php?action=detail&client_id=%s&client_pw=%s", $id, $pw);

ini_set('memory_limit', '1500M');

if (!empty($_POST)) {
	$ch = curl_init();

	$url = $_POST['url'];

	if (isset($_POST['debug'])) {
		$url .= '&XDEBUG_SESSION_START=phpstorm';
	}

	
	
	$data = array(body=>"some test shit");
print_r($data);

foreach($data as $key=>$value) {
	$fields_string .= $key.'='.$value.'&';
}
rtrim($fields_string, '&');
echo $fields_string;



	curl_setopt($ch, CURLOPT_URL,            $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt($ch, CURLOPT_POST,           1 );
	curl_setopt($ch, CURLOPT_POSTFIELDS,     $fields_string );
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
	$_POST['body'] = "Test Data";
}

$debug_checked = (isset($_POST['debug'])) ? ' checked="checked" ' : '';

?>

<form action="<?php echo $default_url; ?>" method="post">
URL: <input size="100" type="text" name="url" value="<?php echo $_POST['url']; ?>"/> <input <?php echo $debug_checked?> type="checkbox" name="debug" value="1" /> Debug<br />
Body: <textarea rows="20" cols="100" name="body"><?php echo $_POST['body']?></textarea><br />
<input type="submit"><br />
</form>

