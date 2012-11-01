<?php
// transactionLeads.class.php
/***********************************************
* Created:            Oct 31, 2012 10:59:03 AM
* Last Modified:      Oct 31, 2012 10:59:03 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class TransactionLeads extends BB_Data {
	protected $self = "transactionLeads";

	public function save($data) {
		$qry = sprintf("INSERT INTO %s", $this->self);
		$this->dbConnection->query($qry);
	}

}