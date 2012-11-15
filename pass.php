<?php
include ("test/xml_data.php");
/*****************\
 * Display Errors - code
\*****************/

 ini_set('display_errors', 1);
 ini_set('log_errors', 1);
 ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
 error_reporting(E_ALL);
 
 /*****************\
 * XML DATA STRUCTURE - code $xml_data constains it all 
  * 
   replace the hard coded data with data bound fields 
  * pulled from your data base
  * web form  
  * 
  * example $_POST['STOREKEY'] or $_POST['LASTNAME']
  * 
\*****************/
 
$URL = "http://" . $_SERVER['SERVER_NAME'] . "/bbapi.php?";

function post_xml($url, $xml) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLINFO_HEADER_OUT, true);
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
  curl_setopt($ch, CURLOPT_USERPWD, 'test:test');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, array('apipassword'=>'test','apiusername'=>'test','apikey'=>'I5uHFVhfKGWpdXOr','apiId'=>'jjOku930uroLJKsdur093ioprjekpkfe923i','apiKey'=>'JJFIOJIEjioej9089I90FKDKKLDSKkldks','apiRef'=>'c4ca4238a0b923820dcc509a6f75849b', 'revere'=>$xml));
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

if (get_magic_quotes_runtime())
{
	$xml_data = stripslashes($xml_data);
}

//send data to black via the post_xml(parmam1 string, param2 xml string) function
$result = post_xml($URL, $xml_data);//store results

// output results or insert code here to insert a new record in your database.
print_r($result); 

?>

