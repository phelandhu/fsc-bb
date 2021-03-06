<?php
// bankingInformation.class.php
/***********************************************
* Created:            Oct 31, 2012 10:55:29 AM
* Last Modified:      Oct 31, 2012 10:55:29 AM
*
* V1.0
* Changes to the DB have been removed, I need to create the classes first and test with them, then make the DB changes. 
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class BankingInformation extends BB_Data {
	protected $self = "Bankinginformation";
	
	public function save($data) {
		$qry = sprintf("INSERT INTO %s
(`PersonalinformationID`, `ACCOUNTHOLDER`, `BANKNAME`, `BANKPHONE`, `ACCOUNTTYPE`, `ROUTINGNUMBER`, `ACCOUNTNUMBER`, `BANKMONTHS`, `BANKYEARS`, `OUTSTANDINGAMT`, `ACTIVECHECKING` )
VALUES
( %s, '%s', '%s', '%s', '%s', '%s', '%s', %s, %s, %s, %s )", 
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
	
	public function getOneByID($id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE BankinginformationID = %s", $this->self, $id));
	}
	
}