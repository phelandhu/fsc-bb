<?php
// rulesValidation.class.php
/***********************************************
* Created:            Mar 13, 2013 2:54:23 PM
* Last Modified:      Mar 13, 2013 2:54:23 PM
*
* This is the class to validate the rules, I will run it here so that I can call it from multiple locations.
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class RulesValidation {
	/*
	 * @param dataIn
	 * @param rulesResult
	 * @return Boolean showing false if any of the rules failed, or true if all passed
	 */
	public function validateData2Bool($dataIn, $rulesResult) {
		$response = null;

		while($row = $rulesResult->fetch_array()) {
			// instead of copying to a new array simply run the rules test now
			$rulesArray[] = call_user_func($row["PHPLocation"], $row["value"], strtoupper ($row["FieldName"]), $dataIn);
		}
		if(in_array ( 1, $rulesArray)) {
			$response = false;
		} else {
			$response = true;
		}
	} 
	
}