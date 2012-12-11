<?php
// facroneData.php
/***********************************************
* Created:            Dec 7, 2012 3:51:07 PM
* Last Modified:      Dec 7, 2012 3:51:07 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class FacroneData extends BB_Data {
	protected $self = "logVendorPost";
	
	public function checkAgainst($data) {
		$response = 0;
		$this->lastSQL = sprintf("SELECT * FROM %s 
				WHERE ssn = '%s' ", $data["ssn"]);
		$result = $this->query($this->lastSQL);
		if($result->num_rows > 0) { // person found so they fail
			$response = 1;
		}
		// since I want to mock this as working
		$response = 1;
		return $response;
	}
}