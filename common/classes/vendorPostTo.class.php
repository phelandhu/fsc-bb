<?php
// vendorPostTo.php
/***********************************************
* Created:            Dec 7, 2012 3:51:07 PM
* Last Modified:      Dec 7, 2012 3:51:07 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class VendorPostTo extends BB_Data {
	protected $self = "logVendorPost";
	
	public function save($data) {
		$this->lastSQL = sprintf("INSERT INTO %s
				(`dateCreated`, `vendorPostTo`, `response`, `urlPostedTo`, `transactionLeadId`)
				VALUES
				(now(), '%s', '%s', '%s', %s)",
				$this->self,
				$this->dbConnection->real_escape_string($data['vendorPostTo']),
				$this->dbConnection->real_escape_string($data['response']),
				$this->dbConnection->real_escape_string($data['urlPostedTo']),
				$data['transactionLeadId']);
		$this->dbConnection->query($this->lastSQL);
	}
}