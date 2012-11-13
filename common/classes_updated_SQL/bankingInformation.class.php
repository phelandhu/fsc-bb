<?php
// bankingInformation.class.php
/***********************************************
* Created:            Oct 31, 2012 10:55:29 AM
* Last Modified:      Oct 31, 2012 10:55:29 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* /bootstrap.php will include the bbData.class.php file,
* but if you are calling this outside of that file or for unit testing you
* must include it explicitly.
* 
* Mike Browne - phelandhu@gmail.com
***********************************************/

class BankingInformation extends BB_Data {
	protected $self = "bankingInformation";
	
	public function save($data) {
		$qry = sprintf("INSERT INTO %s
(`dateCreated`, `name`, `comment`, `personalInformationId`, `accountHolder`, `bankName`, `bankPhone`, `accountType`, `routingNumber`, `accountNumber`, `bankMonths`, `bankYears`, `outstandingAmt`, `activeChecking` )
VALUES
( now(), '', '', %s, '%s', '%s', '%s', '%s', '%s', '%s', %s, %s, %s, %s )", 
		$this->self,
		$data['personalInformationId'],
		$data['accountHolder'],
		$data['bankName'],
		$data['bankPhone'],
		$data['accountType'],
		$data['routingNumber'],
		$data['accountNumber'],
		$data['bankMonths'],
		$data['bankYears'],
		$data['outstandingAmt'],
		$data['activeChecking']
		);
		$this->dbConnection->query($qry);
	}
	
}