<?php
// rulesDefinitions.php
/***********************************************
* Created:            Nov 27, 2012 2:42:20 PM
* Last Modified:      Nov 27, 2012 2:42:20 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
require_once("external/class.holiday.php");


// for all of these true=1, false=0


// @todo finish this stub
function validate_data_Exist($value, $fieldName, $data) {
	print("validate_data_Exist\n");
}

function validate_date_isHoliday($value, $fieldName, $data) {
	$result = 0;
	$date = $data[$fieldName];
	list($m, $d, $y) = preg_split('/\-/', $date);
	$mydate = sprintf('%4d-%02d-%02d', $y, $m, $d);
	echo $mydate;
	$holiday = new holiday($mydate, array("all"));
	$holidayToday = $holiday->isHoliday();
	echo "Is holiday: ", $holidayToday, "\n";
	if($holidayToday) {
		$result = 0;
		echo $result;
	} else {
		$result = 1;
	}
/*
	
	switch($date) {
		case $year.'-01-01':
			$result = '0';
			break;
		case $year.'-01-16':
			$result = '0';
			break;
		case $year.'-02-20':
			$result = '0';
			break;
		case $year.'-05-28':
			$result = '0';
			break;
		case $year.'-07-04':
			$result = '0';
			break;
		case $year.'-09-03':
			$result = '0';
			break;
		case $year.'-10-08':
			$result = '0';
			break;
		case $year.'-11-12':
			$result = '0';
			break;
		case $year.'-07-22':
			$result = '0';
			break;
		case $year.'-12-25':
			$result = '0';
			break;
		default:
			$result = '1';
	}
	*/
	return $result;
}

function validate_date_isWeekEnd($value, $fieldName, $data) {
	$date = $data[$fieldName];	
	$date1 = strtotime($date);
	$date2 = date("l", $date1);
	$date3 = strtolower($date2);
	$result = 0;
	if(($date3 == "saturday" )|| ($date3 == "sunday")){
		$result = 0;
	} else {
		$result = 1;
	}
	return $result;
}
// @todo finish this stub
function validate_date_xdaysGreater($value, $fieldName, $data) {
	$result = "0";
	$year2days =  30*$subject ;
	 
	//print_r(" ".$year2days);
	if( intval($str) < intval($year2days) ) {
		$result = "1";
	} else {
		$result = "0";
	}
	return $result;
}
// @todo finish this stub
function validate_isFalse($value) {
	$result = 0;
	if($value == '1') {
		$result = 1;
	} else {
		$result = 0;
	}
	return( $result );
}
// @todo finish this stub
function validate_isTrue($value, $fieldName, $data) {
	$result = "0";
	if($value == '1') {
		$result = '0';
	} else {
		$result = '1';
	}
	return( $result );
}
// @todo finish this stub
function validate_numeric_equalEqualTo_CharCount($value, $fieldName, $data) {
	$result = "0";
	if(  $str == strlen($subject) ) {
		$result = "1";
	} else {
		$result = "0";
	}
	return $result;
}
// @todo finish this stub
function validate_numeric_greaterThanEqualTo($value, $fieldName, $data) {
	$result = "0";
	print_r("<teststuff>");
	print_r("str is:".$str);
	print_r("||");
	print_r("subject is:".$this->value);
	print_r("</teststuff>");
	 
	if(  $this->value  >= $str  )
	{
		$result = "1";
	}else{
		$result = "0";
	}
	return $result;
}
// @todo finish this stub
function validate_numeric_lesser($value, $fieldName, $data) {
	$result = "0";
	if( intval( $str ) < intval( $subject ) && intval( $str ) == intval( $subject ) )
	{	
		$result = "1";
	}else{
		$result = "0";
	}
	return $result;
}
// @todo finish this stub
function validate_text_contains($value, $fieldName, $data) {
	$result = 0;
	if (preg_match("/\b".$value."\b/i", $data[$fieldName])) {
		$result = 1;
	} else {
		$result = 0;
	}
	return $result;
}

function validate_text_does_not_contain($value, $fieldName, $data) {
	$result = 0;
	if (preg_match("/\b".$value."\b/i", $data[$fieldName])) {
		$result = 0;
	} else {
		$result = 1;
	}
	return $result;
}
