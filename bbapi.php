<?php
error_reporting(-1);
session_start();
include ("bootstrap.php");
include ("common/classes/member.class.php");
include ("common/classes/rules.class.php");
include ("common/classes/leadProvider.class.php");
include ('common/classes/BBCORE.php');
include ("common/external/xml2Array.php");
$member = new Member($dbDataArr);
$rules = new Rules($dbDataArr);
$leadProvider = new LeadProvider($dbDataArr);
$logger = new Logger("/tmp/log.log");

$bolUnAuth = true;

//header("Content-type: text/xml\n");
/* 
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n"; 
 */
//echo "<result>\n";


// Log the request
if($_SERVER['REQUEST_METHOD'] == 'GET') {
	$logger->logWrite("GET Data:\n" . print_r($_GET, true));
} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
	$logger->logWrite("POST Data:\n" . print_r($_POST, true));
} else {
	$logger->logWrite("Nothing was submitted");
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["apiId"]) && isset($_GET["apiKey"])) {
	$bolUnAuth = false;
	$apiusername = $_GET["apiusername"];
	$apipassword = $_GET["apipassword"];
	$apikey      = $_GET["apikey"];
	$apiId		 = $_GET["apiId"];
	$apiKey		 = $_GET["apiKey"];

	$resultLP = $leadProvider->getOneByAPIIdAndKey($apiId, $apiKey);
	echo ('<code> 0 </code><msg>(Authorized), Authentication Successfull </msg>');
	if($resultLP->num_rows == 1) {
		$resultMem = $member->getOneByAPIRef($apiRef);
		if($resultMem->num_rows == 1) {
			$row = $resultMem->fetch_array();
			$rules_result = $rules->getRulesByMemberId($row['id']);
			$rules_Array = array();
			while($row = $rules_result->fetch_array()) {
				$rules_Array[] = $row;
			}
			
			$bbcore = new BBCORE($_GET, $rules_Array, $dbDataArr);
		}
		/*
		 $table = 'member'; // Members name
		$username = mysql_real_escape_string($apiusername);
		$password = hash('sha512', $apipassword);
		// 1. change this so that it gets the data using username and apikey, little more secure
		$result = $member->getOneByUsernameAndPassword($username, $password);
		if($result->num_rows == 1) {
		$row = $result->fetch_array();
		$memberId = $row['id'];
		$leadproviderid = $row['leadProviderId'];
		$_SESSION['username'] = htmlspecialchars($apiusername); // htmlspecialchars() sanitises XSS
		print_r('<code> 0 </code><msg>(Authorized), Authentication Successful </msg>');
		$rules_result = $rules->getRulesByMemberId($memberId);
		$rules_Array = array();
		while($row = $rules_result->fetch_array()) {
		$rules_Array[] = $row;
		}
		$bbcore = new BBCORE($_GET, $rules_Array, $dbDataArr);

		*/
	} else {
		$bolUnAuth = true;
	}
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["apiId"]) && isset($_POST["apiKey"])   ) {
	$bolUnAuth = false;
	$xmlsource = $_POST['revere'];
	//			$array = XML2Array::createArray($xmlsource);
	//echo $xmlsource;

	$array = json_decode(json_encode((array) simplexml_load_string($xmlsource)), 1);
	$newarraytest = array();
	$last_subarray_found = "";
	$array3 = flatten_array($array, 2, $newarraytest, $last_subarray_found);
	// print_r($array3 );
//	$apiusername = $_POST["apiusername"];
//	$apipassword = $_POST["apipassword"];
//	$apikey      = $_POST["apikey"];
	$apiId		 = $_POST["apiId"];
	$apiKey		 = $_POST["apiKey"];

	$resultLP = $leadProvider->getOneByAPIIdAndKey($apiId, $apiKey);
	echo ('<code> 0 </code><msg>(Authorized), Authentication Successful </msg>');
	if($resultLP->num_rows == 1) {
		$resultMem = $member->getOneByAPIRef($apiRef);
		if($resultMem->num_rows == 1) {
			$row = $resultMem->fetch_array();
			$rules_result = $rules->getRulesByMemberId($row['id']);
			$rules_Array = array();
			while($row = $rules_result->fetch_array()) {
				$rules_Array[] = $row;
			}
			$bbcore = new BBCORE($array3, $rules_Array, $dbDataArr);
		}
	} else { // fail
		$bolUnAuth = true;
	}
	
	
/*	
	$username = mysql_real_escape_string($_POST['apiusername']);
	$password = hash('sha512', $_POST['apipassword']);
	// see 1. above
	$result = $member->getOneByUsernameAndPassword($username, $password);
	$row = $result->fetch_array();
	$memberId = $row['id'];
	print("test me");
		
	if($result->num_rows > 0) {
		$leadproviderid = $row['LeadProviderID_Default'];
		$_SESSION['username'] = htmlspecialchars($apiusername); // htmlspecialchars() sanitises XSS
		$_SESSION['id'] = $memberId;
		echo ('<code> 0 </code><msg>(Authorized), Authentication Successfull </msg>');
		$result_rules = $rules->getRulesByUsername($username);
		echo "Results returned: ", $result_rules->num_rows;

		$rules_Array = array();
		while($row=$result_rules->fetch_array()) {
			$rules_Array[] = $row;
		}
		die();
		//print_r($rules_Array);
		$bbcore = new BBCORE($array3, $rules_Array, $dbDataArr);
	} else {
		$bolUnAuth = true;
	}
	*/
}

if($bolUnAuth == true) {
	echo "<code> 401 </code><msg>(Not Authorized), Authentication Failed, Failure with 1 or more API Authentication Elements Supplied </msg>";
}

echo "</result>";



/****************************************\
print_r("<header>");
print_r("<apititle>BLACK BOX</apititle>");
print_r("<apiversion>Ver. 0.1a 6/15/16</apiversion>");
print_r("<apikey>".  md5("test"."test".date("YmdHis") )."</apikey>");
print_r("<requestmethod>".$_SERVER['REQUEST_METHOD']."</requestmethod>");
 * 
\****************************************/
function flatten_array($array, $preserve_keys = 2, &$out = array(), &$last_subarray_found) 
{
        foreach($array as $key => $child)
        {
            if(is_array($child))
            {
                $last_subarray_found = $key;
                $out = flatten_array($child, $preserve_keys, $out, $last_subarray_found);
            }
            elseif($preserve_keys + is_string($key) > 1)
            {
                if ($last_subarray_found)
                {
                    $sfinal_key_value = $last_subarray_found . "_" . $key;
                    //$sfinal_key_value = $key;
                }
                else
                {
                    $sfinal_key_value = $key;
                }
                $out[$sfinal_key_value] = $child;
            }
            else
            {
                $out[] = $child;
            }
        }

        return $out;
}


/*
 Working with XML. Usage:
$xml=xml2ary(file_get_contents('1.xml'));
$link=&$xml['ddd']['_c'];
$link['twomore']=$link['onemore'];
// ins2ary(); // dot not insert a link, and arrays with links inside!
echo ary2xml($xml);
*/

// XML to Array
function xml2ary(&$string) {
	$parser = xml_parser_create();
	xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
	xml_parse_into_struct($parser, $string, $vals, $index);
	xml_parser_free($parser);

	$mnary=array();
	$ary=&$mnary;
	foreach ($vals as $r) {
		$t=$r['tag'];
		if ($r['type']=='open') {
			if (isset($ary[$t])) {
				if (isset($ary[$t][0])) $ary[$t][]=array(); else $ary[$t]=array($ary[$t], array());
				$cv=&$ary[$t][count($ary[$t])-1];
			} else $cv=&$ary[$t];
			if (isset($r['attributes'])) {
				foreach ($r['attributes'] as $k=>$v) $cv['_a'][$k]=$v;
			}
			$cv['_c']=array();
			$cv['_c']['_p']=&$ary;
			$ary=&$cv['_c'];

		} elseif ($r['type']=='complete') {
			if (isset($ary[$t])) { // same as open
				if (isset($ary[$t][0])) $ary[$t][]=array(); else $ary[$t]=array($ary[$t], array());
				$cv=&$ary[$t][count($ary[$t])-1];
			} else $cv=&$ary[$t];
			if (isset($r['attributes'])) {
				foreach ($r['attributes'] as $k=>$v) $cv['_a'][$k]=$v;
			}
			$cv['_v']=(isset($r['value']) ? $r['value'] : '');

		} elseif ($r['type']=='close') {
			$ary=&$ary['_p'];
		}
	}

	_del_p($mnary);
	return $mnary;
}

// _Internal: Remove recursion in result array
function _del_p(&$ary) {
	foreach ($ary as $k=>$v) {
		if ($k==='_p') unset($ary[$k]);
		elseif (is_array($ary[$k])) _del_p($ary[$k]);
	}
}

// Array to XML
function ary2xml($cary, $d=0, $forcetag='') {
	$res=array();
	foreach ($cary as $tag=>$r) {
		if (isset($r[0])) {
			$res[]=ary2xml($r, $d, $tag);
		} else {
			if ($forcetag) {
				$tag=$forcetag;
			}
			$sp=str_repeat("\t", $d);
			$res[]="$sp<$tag";
			if (isset($r['_a'])) {
				foreach ($r['_a'] as $at=>$av) $res[]=" $at=\"$av\"";
			}
			$res[]=">".((isset($r['_c'])) ? "\n" : '');
			if (isset($r['_c'])) {
				$res[]=ary2xml($r['_c'], $d+1);
			}
			elseif (isset($r['_v'])) {
				$res[]=$r['_v'];
			}
			$res[]=(isset($r['_c']) ? $sp : '')."</$tag>\n";
		}
	}
	return implode('', $res);
}


// Insert element into array
function ins2ary(&$ary, $element, $pos) {
	$ar1=array_slice($ary, 0, $pos); $ar1[]=$element;
	$ary=array_merge($ar1, array_slice($ary, $pos));
}
