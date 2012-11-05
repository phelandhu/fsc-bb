<?php
session_start();
include("common/include/site_setup.php");
include("common/include/db_login.php");
include('common/classes/BBCORE.php');
include('common/classes/member.class.php');
include('common/classes/rules.class.php');
$member = new Member($dbDataArr);
$rules = new Rules($dbDataArr);
$apiusername = $revere = $_POST['apiusername'];
$apipassword = $revere = $_POST['apipassword'];
$revere = $_POST['revere'];
//print_r($revere);

$xml = simplexml_load_string( $revere );

$urlstring = "";

$REFERRAL = $xml->REFERRAL;
$PERSONAL = $xml->CUSTOMER->PERSONAL;
$EMPLOYMENT = $xml->CUSTOMER->EMPLOYMENT;
$BANK = $xml->CUSTOMER->BANK;
$REFERENCES = $xml->CUSTOMER->REFERENCES;

$REF ="";
foreach( $REFERENCES as $refa) {
	foreach( $refa as $refkey) {
		foreach( $refkey as $key=>$value) {
			if($value != "") {
				$REF.= "REF".strtoupper($key)."=".$value."&";
			}
		}
	}
}
die('Everywhere');
$urlstring .=       "http://" . $siteURL . "/bbapi.bbx?".'apiusername='.$apiusername.'&apipassword='.$apipassword;
$urlstring .=       '&'.http_build_query($REFERRAL);
$urlstring .=       '&'.http_build_query($PERSONAL);
$urlstring .=       '&'.http_build_query($EMPLOYMENT);
$urlstring .=       '&'.http_build_query($BANK);
$urlstring .=       '&'.substr($REF,0,-1);

//header('Location: http://www.fsc-bb.com/dev/bbapi.bbx?apiusername=test&apipassword=test&STOREKEY=I5uHFVhfKGWpdXOr');

print_r(http_build_query($REFERRAL));
header("Content-type: text/xml");
print_r("<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>");
print_r("<result>");
print_r("<header>");
print_r("<apititle>BLACK BOX</apititle>");
print_r("<apiversion>Ver. 0.1a 6/15/16</apiversion>");
print_r("<apikey>".  md5("test"."test".date("YmdHis") )."</apikey>");
print_r("<requestmethod>".$_SERVER['REQUEST_METHOD']."</requestmethod>");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$apiusername     = $_POST["apiusername"];
	$apipassword    = $_POST["apipassword"];
	$apikey         = $_POST["apikey"];
	
	$_SESSION['username']   = $apiusername;
	$table                  = 'member'; // Members name
	
	mysql_connect($host, $user, $pass);
	mysql_select_db($database);
	
	$username = mysql_real_escape_string($_POST['apiusername']);
	$password = hash('sha512', $_POST['apipassword']);
	
//	$result = mysql_query("SELECT * FROM $table WHERE username = '$username' AND password = '$password'");
	$result = $member->getOneByUsernameAndPassword($username, $password);
	
	
	if($result->num_rows > 0)
	{
		$row = $result->fetch_array();
		
		$leadproviderid = $row['leadProviderId'];
		$_SESSION['username'] = htmlspecialchars($apiusername); // htmlspecialchars() sanitises XSS
		$session['memberId'] = $row["id"];
		
		print_r('<code> 0 </code><msg>(Authorized), Authentication Successfull </msg>');
		print_r("</header>");
		/*
		mysql_connect($host, $user, $pass);
		$result_rules = "SELECT rl.PHPLocation, rl.value, rl.FieldName FROM  `member` m LEFT JOIN  `RulesManagementSet` rm ON rm.`memberID` =  `m`.`id` LEFT JOIN  `rules` rl ON  `rl`.`rulesID` =  `rm`.`rulesID` WHERE username =  '".$username."' AND rm.Active = 1";
		$result_rl =  mysql_query($result_rules);
		*/
		$result_rl = $rules->getRulesByMemberId($memberId);
		
		
		//echo '<sql>';
		//print_r($result_rules);
		//echo '</sql>';
		$rules_Array = array();
		
		while($row = $result_rl->fetch_array())
		{
			$rules_Array[] = $row;
		}
		
		$bbcore = new BBCORE($urlstring,$rules_Array);
		
	}
	else
	{
		// Invalid username/password
		print_r('<code> 401 </code><msg>(Not Authorized), Authentication Failed, Failure with 1 or more API Authentication Elements Supplied </msg>');
		print_r("</header>");
		//echo $password;
		//header('Location: http://20ae-fscbb-primary.hgsitebuilder.comindex.php');
	
	}
	print_r("</result>");
}

?>
