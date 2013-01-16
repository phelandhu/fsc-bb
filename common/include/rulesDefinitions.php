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
	$validate = 0;
	$date = $data[$fieldName];
	list($m, $d, $y) = preg_split('/\-/', $date);
	$mydate = sprintf('%4d-%02d-%02d', $y, $m, $d);
	echo $mydate;
	$holiday = new holiday($mydate, array("all"));
	$holidayToday = $holiday->isHoliday();
	echo "Is holiday: ", $holidayToday, "\n";
	if($holidayToday) {
		$validate = 0;
		echo $validate;
	} else {
		$validate = 1;
	}
/*
	
	switch($date) {
		case $year.'-01-01':
			$validate = '0';
			break;
		case $year.'-01-16':
			$validate = '0';
			break;
		case $year.'-02-20':
			$validate = '0';
			break;
		case $year.'-05-28':
			$validate = '0';
			break;
		case $year.'-07-04':
			$validate = '0';
			break;
		case $year.'-09-03':
			$validate = '0';
			break;
		case $year.'-10-08':
			$validate = '0';
			break;
		case $year.'-11-12':
			$validate = '0';
			break;
		case $year.'-07-22':
			$validate = '0';
			break;
		case $year.'-12-25':
			$validate = '0';
			break;
		default:
			$validate = '1';
	}
	*/
	return $validate;
}

function validate_date_isWeekEnd($value, $fieldName, $data) {
	$date = $data[$fieldName];	
	$date1 = strtotime($date);
	$date2 = date("l", $date1);
	$date3 = strtolower($date2);
	$validate = 0;
	if(($date3 == "saturday" )|| ($date3 == "sunday")){
		$validate = 0;
	} else {
		$validate = 1;
	}
	return $validate;
}
// @todo finish this stub
function validate_date_xdaysGreater($value, $fieldName, $data) {
	$validate = "0";
	$year2days =  30*$subject ;
	 
	//print_r(" ".$year2days);
	if( intval($str) < intval($year2days) ) {
		$validate = "1";
	} else {
		$validate = "0";
	}
	return $validate;
}

function validate_isFalse($fieldName, $data) {
	$validate = 0;
	$testVal = $data[$fieldName];
	if($testVal == "1") {
		$validate = 0;
	} else {
		$validate = 1;
	}
	return( $validate );
}

function validate_isTrue($fieldName, $data) {
	$validate = 0;
	$testVal = $data[$fieldName];
	if($testVal == "0") {
		$validate = 0;
	} else {
		$validate = 1;
	}
	return( $validate );
}

function validate_numeric_equalEqualTo_CharCount($value, $fieldName, $data) {
	$validate = "0";
	$testVal = $data[$fieldName];
	if( ctype_digit($testVal) && $value == strlen($testVal) ) {
		$validate = "0";
	} else {
		$validate = "1";
	}
	return $validate;
}

function validate_numeric_greaterThanEqualTo($value, $fieldName, $data) {
	$validate = "0";
	$testVal = $data[$fieldName];
	if( ctype_digit( $testVal ) && intval( $value ) <= intval( $testVal ) ) {
		$validate = "0";
	} else {
		$validate = "1";
	}
	return $validate;
}
// @todo finish this stub
function validate_numeric_lesser($value, $fieldName, $data) {
	$validate = "0";
	$testVal = $data[$fieldName];
	if( ctype_digit( $testVal ) && intval( $value ) > intval( $testVal ) ) {
		$validate = "0";
	} else {
		$validate = "1";
	}
	return $validate;
}
// @todo finish this stub
function validate_text_contains($value, $fieldName, $data) {
	$validate = 0;
	if (preg_match("/\b" . $value . "\b/i", $data[$fieldName])) {
		$validate = 1;
	} else {
		$validate = 0;
	}
	return $validate;
}

function validate_text_does_not_contain($value, $fieldName, $data) {
	$validate = 0;
	if (preg_match("/\b" . $value . "\b/i", $data[$fieldName])) {
		$validate = 0;
	} else {
		$validate = 1;
	}
	return $validate;
}
