<?php
// facroneData.class.php
/***********************************************
* Created:            Nov 27, 2012 12:18:31 PM
* Last Modified:      Nov 27, 2012 12:18:31 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class Campaign extends BB_Data {
	protected $self = "user";
	
	public function getClientBySocial($social) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE SSN = %s", $this->self, $social));
	}
}