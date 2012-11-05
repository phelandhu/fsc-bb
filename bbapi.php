<?php
error_reporting(-1);
session_start();
include ("bootstrap.php");
include ("common/classes/member.class.php");
include ("common/classes/rules.class.php");
include('common/classes/BBCORE.php');
$member = new Member($dbDataArr);
$rules = new Rules($dbDataArr);

header("Content-type: text/xml\n");
print_r("<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n");

print_r("<result>\n");
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


if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["apiusername"]) && isset($_GET["apipassword"]) && isset($_GET["apikey"]) ) {
	$apiusername = $_GET["apiusername"];
	$apipassword = $_GET["apipassword"];
	$apikey      = $_GET["apikey"];
	
/*
$host = 'localhost'; // Host name Normally 'LocalHost'
$user = 'root'; // MySQL login username
$pass = 'Keyb0ard!'; // MySQL login password
$database = 'BlackBox'; // Database name
$table = 'member'; // Members name
mysql_connect($host, $user, $pass);
mysql_select_db($database);
*/
	
	$table = 'member'; // Members name
	$username = mysql_real_escape_string($apiusername);
	$password = hash('sha512', $apipassword);
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
		$bbcore = new BBCORE($_GET,$rules_Array, $dbDataArr);
	} else {
		// Invalid username/password
		print_r('<code> 401 </code><msg>(Not Authorized), Authentication Failed, Failure with 1 or more API Authentication Elements Supplied </msg>');
		//echo $password;
		//header('Location: http://20ae-fscbb-primary.hgsitebuilder.comindex.php');
	}
} elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["apiusername"]) && isset($_POST["apipassword"]) ) {
			$xmlsource = $_POST['revere'];
			$array = XML2Array::createArray($xmlsource);
			$newarraytest = array();
			$last_subarray_found = "";
			$array3 = flatten_array($array, 2, $newarraytest, $last_subarray_found);
			// print_r($array3 );
			$apiusername = $_POST["apiusername"];
			$apipassword = $_POST["apipassword"];
			$apikey      = $_POST["apikey"];
			/*
			$host = 'localhost'; // Host name Normally 'LocalHost'
			$user = 'root'; // MySQL login username
			$pass = 'Keyb0ard!'; // MySQL login password
			$database = 'BlackBox'; // Database name
			$table = 'member'; // Members name
			mysql_connect($host, $user, $pass);
			mysql_select_db($database);
			*/
			$username = mysql_real_escape_string($_POST['apiusername']);
			$password = hash('sha512', $_POST['apipassword']);
			$member->getOneByUsernameAndPassword($username, $password);
			$row = $result->fetch_array();
			$memberId = $row['id'];
			
			if(mysql_num_rows($result)) {
				$leadproviderid = $row['LeadProviderID_Default'];
				$_SESSION['username'] = htmlspecialchars($apiusername); // htmlspecialchars() sanitises XSS
				$_SESSION['id'] = $memberId;
				print_r('<code> 0 </code><msg>(Authorized), Authentication Successfull </msg>');
				mysql_connect($host, $user, $pass);
				$result_rules = "SELECT rl.PHPLocation, rl.value, rl.FieldName FROM  `member` m LEFT JOIN  `RulesManagementSet` rm ON rm.`memberID` =  `m`.`id` LEFT JOIN  `rules` rl ON  `rl`.`rulesID` =  `rm`.`rulesID` WHERE username =  '".$username."' AND rm.Active = 1";
				$result_rl =  mysql_query($result_rules);
				//echo '<sql>';
				//print_r($result_rules);
				//echo '</sql>';
				$rules_Array;
				while($row=mysql_fetch_array($result_rl)) {
					$rules_Array[] = $row;
				}
				//print_r($rules_Array);
				$bbcore = new BBCORE($array3,$rules_Array);
		}
		/*
	} else {
		// Invalid username/password
		print_r('<code> 401 </code><msg>(Not Authorized), Authentication Failed, Failure with 1 or more API Authentication Elements Supplied </msg>');
		//echo $password;
		//header('Location: http://20ae-fscbb-primary.hgsitebuilder.comindex.php');
	}
	*/
} else {
		// Invalid username/password
		print_r('<code> 401 </code><msg>(Not Authorized), Authentication Failed, Failure with 1 or more API Authentication Elements Supplied </msg>');
		//echo $password;
		//header('Location: http://20ae-fscbb-primary.hgsitebuilder.comindex.php');
}
print_r("</result>");
?>
