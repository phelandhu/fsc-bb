<?php
/***********************************************
* Created:            Fri 02 Nov 2012 09:16:36 AM PDT 
* Last Modified:      Fri 16 Nov 2012 04:40:27 PM PST
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
error_reporting(-1);
session_start();
include_once("bootstrap.php");
include_once("common/classes/member.class.php");
include_once("common/classes/rules.class.php");
include_once("common/classes/leadProvider.class.php");
include_once("common/include/rulesDefinitions.php");
include_once("common/classes/BBCORE.php");
include_once("common/external/xml2Array.php");
include_once("common/classes/postEpic.class.php");
include_once("common/classes/postLbmc.class.php");

$member = new Member($dbDataArr);
$rules = new Rules($dbDataArr);
$leadProvider = new LeadProvider($dbDataArr);
//$logger = new Logger("/tmp/log.log");
//print_r(get_class_methods($logger));

$bolUnAuth = true;
/*
// Log the request
if($_SERVER['REQUEST_METHOD'] == 'GET') {
	$log->trace("GET Data:\n" . print_r($_GET, true));
} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
	$log->trace("POST Data:\n" . print_r($_POST, true));
} else {
	$log->trace("Nothing was submitted");
}
*/
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
	echo ('<code> 0 </code><msg>(Authorized), Authentication Successful Post received</msg>');
	if($resultLP->num_rows == 1) {
		$resultMem = $member->getOneByAPIRef($apiRef);
		if($resultMem->num_rows == 1) {
			$row = $resultMem->fetch_array();
			$rules_result = $rules->getRulesByMemberId($row['id']);
			$rulesArray = array();
//			print_r($array3);
			while($row = $rules_result->fetch_array()) {
				// instead of copying to a new array simply run the rules test now
				$rulesArray[] = call_user_func($row["PHPLocation"], $row["value"], strtoupper ($row["FieldName"]), $array3);
				
				//$rules_Array[] = $row;
			}
			//$bbcore = new BBCORE($array3, $rules_Array, $dbDataArr);
		}
	} else { // fail
		$bolUnAuth = true;
	}
	print_r($rulesArray);
	if(in_array ( 1, $rulesArray )){ // Rules failed
		echo "Rules Failed";
		$epic = new PostEPIC();
		echo $epic->post2EPIC($xmlsource);
	} else { // Rules passed
		echo "Rules Passed";
		$epic = new PostEPIC();
		$epic->post2EPIC($xmlsource);
	}
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
