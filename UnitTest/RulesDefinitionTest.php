<?php
// RulesDefinitionTest.php
/***********************************************
* Created:            Nov 27, 2012 4:09:08 PM
* Last Modified:      Nov 27, 2012 4:09:08 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/include/rulesDefinitions.php");
include ("../test/xml_data.php");


class RulesTest extends PHPUnit_Framework_TestCase {
	private $_rules = null;
	private $_data;
	private $self;
	private $xml_data_in;
	private $arr_xml_data;
	
	
	public function setUp()
	{
		global $xml_data;
		$this->xml_data_in = $xml_data;
		
		
		$array = json_decode(json_encode((array) simplexml_load_string($xml_data)), 1);
		$newarraytest = array();
		$last_subarray_found = "";
		$this->arr_xml_data = flatten_array($array, 2, $newarraytest, $last_subarray_found);
	}
	
	public function tearDown()
	{
		//unset($this->_rules);
	}
	
/*
	public function testConnection() {
		print_r($this->xml_data_in);
	}
*/	
	public function testResultsAreZero() {
//		validate_data_Exist($value, $fieldName, $data)
		validate_date_isHoliday($value, $fieldName, $data)
		validate_date_isWeekEnd($value, $fieldName, $data)
		validate_date_xdaysGreater($value, $fieldName, $data) 
		validate_isFalse($value)
		validate_isTrue($value, $fieldName, $data)
		validate_numeric_equalEqualTo_CharCount($value, $fieldName, $data)
		validate_numeric_greaterThanEqualTo($value, $fieldName, $data)
		validate_numeric_lesser($value, $fieldName, $data) {
		$this->assertEquals(0, validate_text_contains(".mil", strtoupper("personal_email"), $this->arr_xml_data));
		$this->assertEquals(0, validate_text_does_not_contain(".gov", strtoupper("personal_email"), $this->arr_xml_data));		
		
	}
	/*
	public function testValidateTextContains() {
	
		$result = validate_text_contains(".mil", strtoupper("personal_email"), $this->arr_xml_data);
		echo $result;
	}
	
	public function testValidateEmailContainsMil() {
		$result = validate_text_contains(".mil", strtoupper("personal_email"), $this->arr_xml_data);
		$this->assertEquals(1, $result);
	}

	public function testValidateEmailContainsGov() {
		$result = validate_text_contains(".gov", strtoupper("personal_email"), $this->arr_xml_data);
		$this->assertEquals(0, $result);
	}
	
	public function testValidateDueDateIsHolidayTrue() {
		$data = array("LOANDUEDATE" => "12-25-2012");
		$result = validate_date_isHoliday("Errors", "LOANDUEDATE", $data);
		$this->assertEquals(0, $result);
	}
	
	public function testValidateDueDateIsHolidayFalse() {
		$data = array("LOANDUEDATE" => "12-29-2012");
		$result = validate_date_isHoliday("Errors", "LOANDUEDATE", $data);
		$this->assertEquals(0, $result);
	}
	*/
/*
	public function testValidateDueDateIsWeekendTrue() {
		$data = array("LOANDUEDATE" => "11-24-2012");
		$result = validate_date_isWeekEnd("Errors", "LOANDUEDATE", $data);
		$this->assertEquals(0, $result);
	}
	
	public function testValidateDueDateIsWeekendFalse() {
		$data = array("LOANDUEDATE" => "11-29-2012");
		$result = validate_date_isWeekEnd("Errors", "LOANDUEDATE", $data);
		$this->assertEquals(0, $result);
	}
*/	
}


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