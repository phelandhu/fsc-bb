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

	public function save($data) { // not working yet.
		// I am creating a xover table between this and rules.
		$returnId = null;
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s  SET
						`name` = '%s', `comment` = '%s',
`apiUserName` = '%s', `apiPassWord` = '%s', `storeKey` = '%s', `refUrl` = '%s', `ipAddress` = '%s',
`tierKey` = '%s', `affId` = '%s', `subId` = '%s', `test` = '%s', `requestedAmount` = '%s', `ssn` = '%s', `dob` = '%s', `gender` = '%s',
`firstName` = '%s', `lastName` = '%s', `address` = '%s', `city` = '%s', `state` = '%s', `homePhone` = '%s', `otherPhone` = '%s', `dlState` = '%s',
`dlNumber` = '%s', `contactTime` = '%s', `addressMonths` = '%s', `addressYears` = '%s', `rentOrOwn` = '%s', `isMilitary` = '%s', `isCitizen` = '%s', `otherOffers` = '%s',
`email` = '%s', `incomeType` = '%s', `payType` = '%s', `empMonths` = '%s', `empYears` = '%s', `empName` = '%s', `empAddress` = '%s', `empAddress2` = '%s',
`empCity` = '%s', `empState` = '%s', `empZip` = '%s', `empPhone` = '%s', `empPhoneExt` = '%s', `empFax` = '%s', `supervisorName` = '%s', `supervisorPhone` = '%s',
`supervisorPhoneExt` = '%s', `hireDate` = '%s', `empType` = '%s', `jobTitle` = '%s', `workShift` = '%s', `payFrequency` = '%s', `netMonthly` = '%s', `grossMonthly` = '%s',
`lastPayDate` = '%s', `nextPayDate` = '%s', `secondPayDate` = '%s', `accountHolder` = '%s', `bankName` = '%s', `bankPhone` = '%s', `accountType` = '%s', `routingNumber` = '%s',
`accountNumber` = '%s', `bankMonths` = '%s', `bankYears` = '%s', `outStandingAmt` = '%s', `activeChecking` = '%s', `refFirstName` = '%s', `refLastName` = '%s', `phone` = '%s',
`relationship` = '%s', `flag` = '%s', `results` = '%s', `code` = '%s'
					WHERE id = %s",
					$this->self,
$this->dbConnection->real_escape_string($data['name']), $this->dbConnection->real_escape_string($data['comment']),
$this->dbConnection->real_escape_string($data['apiUserName']), $this->dbConnection->real_escape_string($data['apiPassWord']), $this->dbConnection->real_escape_string($data['storeKey']), $this->dbConnection->real_escape_string($data['refUrl']), $this->dbConnection->real_escape_string($data['ipAddress']),   
$this->dbConnection->real_escape_string($data['tierKey']), $this->dbConnection->real_escape_string($data['affId']), $this->dbConnection->real_escape_string($data['subId']), $this->dbConnection->real_escape_string($data['test']), $this->dbConnection->real_escape_string($data['requestedAmount']), $this->dbConnection->real_escape_string($data['ssn']), $this->dbConnection->real_escape_string($data['dob']), $this->dbConnection->real_escape_string($data['gender']),
$this->dbConnection->real_escape_string($data['firstName']), $this->dbConnection->real_escape_string($data['lastName']), $this->dbConnection->real_escape_string($data['address']), $this->dbConnection->real_escape_string($data['city']), $this->dbConnection->real_escape_string($data['state']), $this->dbConnection->real_escape_string($data['homePhone']), $this->dbConnection->real_escape_string($data['otherPhone']), $this->dbConnection->real_escape_string($data['dlState']),
$this->dbConnection->real_escape_string($data['dlNumber']), $this->dbConnection->real_escape_string($data['contactTime']), $this->dbConnection->real_escape_string($data['addressMonths']), $this->dbConnection->real_escape_string($data['addressYears']), $this->dbConnection->real_escape_string($data['rentOrOwn']), $this->dbConnection->real_escape_string($data['isMilitary']), $this->dbConnection->real_escape_string($data['isCitizen']), $this->dbConnection->real_escape_string($data['otherOffers']),
$this->dbConnection->real_escape_string($data['email']), $this->dbConnection->real_escape_string($data['incomeType']), $this->dbConnection->real_escape_string($data['payType']), $this->dbConnection->real_escape_string($data['empMonths']), $this->dbConnection->real_escape_string($data['empYears']), $this->dbConnection->real_escape_string($data['empName']), $this->dbConnection->real_escape_string($data['empAddress']), $this->dbConnection->real_escape_string($data['empAddress2']),
$this->dbConnection->real_escape_string($data['empCity']), $this->dbConnection->real_escape_string($data['empState']), $this->dbConnection->real_escape_string($data['empZip']), $this->dbConnection->real_escape_string($data['empPhone']), $this->dbConnection->real_escape_string($data['empPhoneExt']), $this->dbConnection->real_escape_string($data['empFax']), $this->dbConnection->real_escape_string($data['supervisorName']), $this->dbConnection->real_escape_string($data['supervisorPhone']),
$this->dbConnection->real_escape_string($data['supervisorPhoneExt']), $this->dbConnection->real_escape_string($data['hireDate']), $this->dbConnection->real_escape_string($data['empType']), $this->dbConnection->real_escape_string($data['jobTitle']), $this->dbConnection->real_escape_string($data['workShift']), $this->dbConnection->real_escape_string($data['payFrequency']), $this->dbConnection->real_escape_string($data['netMonthly']), $this->dbConnection->real_escape_string($data['grossMonthly']),
$this->dbConnection->real_escape_string($data['lastPayDate']), $this->dbConnection->real_escape_string($data['nextPayDate']), $this->dbConnection->real_escape_string($data['secondPayDate']), $this->dbConnection->real_escape_string($data['accountHolder']), $this->dbConnection->real_escape_string($data['bankName']), $this->dbConnection->real_escape_string($data['bankPhone']), $this->dbConnection->real_escape_string($data['accountType']), $this->dbConnection->real_escape_string($data['routingNumber']),
$this->dbConnection->real_escape_string($data['accountNumber']), $this->dbConnection->real_escape_string($data['bankMonths']), $this->dbConnection->real_escape_string($data['bankYears']), $this->dbConnection->real_escape_string($data['outStandingAmt']), $this->dbConnection->real_escape_string($data['activeChecking']), $this->dbConnection->real_escape_string($data['refFirstName']), $this->dbConnection->real_escape_string($data['refLastName']), $this->dbConnection->real_escape_string($data['phone']),					
$this->dbConnection->real_escape_string($data['relationship']), $this->dbConnection->real_escape_string($data['flag']), $this->dbConnection->real_escape_string($data['results']), $this->dbConnection->real_escape_string($data['code'])  ,
					$data['id']);
			//echo $qry;
			$this->dbConnection->query($qry);
			$returnId = $data['id'];
		} else {
			$qry = sprintf("INSERT INTO %s
  ( `dateCreated`, `name`, `comment`, `apiUserName`, `apiPassWord`, `storeKey`, `refUrl`, `ipAddress`,
	`tierKey`, `affId`, `subId`, `test`, `requestedAmount`, `ssn`, `dob`, `gender`,
	`firstName`, `lastName`, `address`, `city`, `state`, `homePhone`, `otherPhone`, `dlState`,
	`dlNumber`, `contactTime`, `addressMonths`, `addressYears`, `rentOrOwn`, `isMilitary`, `isCitizen`, `otherOffers`,
	`email`, `incomeType`, `payType`, `empMonths`, `empYears`, `empName`, `empAddress`, `empAddress2`,
	`empCity`, `empState`, `empZip`, `empPhone`, `empPhoneExt`, `empFax`, `supervisorName`, `supervisorPhone`,
	`supervisorPhoneExt`, `hireDate`, `empType`, `jobTitle`, `workShift`, `payFrequency`, `netMonthly`, `grossMonthly`,
	`lastPayDate`, `nextPayDate`, `secondPayDate`, `accountHolder`, `bankName`, `bankPhone`, `accountType`, `routingNumber`,
	`accountNumber`, `bankMonths`, `bankYears`, `outStandingAmt`, `activeChecking`, `refFirstName`, `refLastName`, `phone`,
	`relationship`, `flag`, `results`, `code`)
VALUES
  ( now(), '', '', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s')",
					$this->self,
$this->dbConnection->real_escape_string($data['apiUserName']), $this->dbConnection->real_escape_string($data['apiPassWord']), $this->dbConnection->real_escape_string($data['storeKey']), $this->dbConnection->real_escape_string($data['refUrl']), $this->dbConnection->real_escape_string($data['ipAddress']),   
$this->dbConnection->real_escape_string($data['tierKey']), $this->dbConnection->real_escape_string($data['affId']), $this->dbConnection->real_escape_string($data['subId']), $this->dbConnection->real_escape_string($data['test']), $this->dbConnection->real_escape_string($data['requestedAmount']), $this->dbConnection->real_escape_string($data['ssn']), $this->dbConnection->real_escape_string($data['dob']), $this->dbConnection->real_escape_string($data['gender']),
$this->dbConnection->real_escape_string($data['firstName']), $this->dbConnection->real_escape_string($data['lastName']), $this->dbConnection->real_escape_string($data['address']), $this->dbConnection->real_escape_string($data['city']), $this->dbConnection->real_escape_string($data['state']), $this->dbConnection->real_escape_string($data['homePhone']), $this->dbConnection->real_escape_string($data['otherPhone']), $this->dbConnection->real_escape_string($data['dlState']),
$this->dbConnection->real_escape_string($data['dlNumber']), $this->dbConnection->real_escape_string($data['contactTime']), $this->dbConnection->real_escape_string($data['addressMonths']), $this->dbConnection->real_escape_string($data['addressYears']), $this->dbConnection->real_escape_string($data['rentOrOwn']), $this->dbConnection->real_escape_string($data['isMilitary']), $this->dbConnection->real_escape_string($data['isCitizen']), $this->dbConnection->real_escape_string($data['otherOffers']),
$this->dbConnection->real_escape_string($data['email']), $this->dbConnection->real_escape_string($data['incomeType']), $this->dbConnection->real_escape_string($data['payType']), $this->dbConnection->real_escape_string($data['empMonths']), $this->dbConnection->real_escape_string($data['empYears']), $this->dbConnection->real_escape_string($data['empName']), $this->dbConnection->real_escape_string($data['empAddress']), $this->dbConnection->real_escape_string($data['empAddress2']),
$this->dbConnection->real_escape_string($data['empCity']), $this->dbConnection->real_escape_string($data['empState']), $this->dbConnection->real_escape_string($data['empZip']), $this->dbConnection->real_escape_string($data['empPhone']), $this->dbConnection->real_escape_string($data['empPhoneExt']), $this->dbConnection->real_escape_string($data['empFax']), $this->dbConnection->real_escape_string($data['supervisorName']), $this->dbConnection->real_escape_string($data['supervisorPhone']),
$this->dbConnection->real_escape_string($data['supervisorPhoneExt']), $this->dbConnection->real_escape_string($data['hireDate']), $this->dbConnection->real_escape_string($data['empType']), $this->dbConnection->real_escape_string($data['jobTitle']), $this->dbConnection->real_escape_string($data['workShift']), $this->dbConnection->real_escape_string($data['payFrequency']), $this->dbConnection->real_escape_string($data['netMonthly']), $this->dbConnection->real_escape_string($data['grossMonthly']),
$this->dbConnection->real_escape_string($data['lastPayDate']), $this->dbConnection->real_escape_string($data['nextPayDate']), $this->dbConnection->real_escape_string($data['secondPayDate']), $this->dbConnection->real_escape_string($data['accountHolder']), $this->dbConnection->real_escape_string($data['bankName']), $this->dbConnection->real_escape_string($data['bankPhone']), $this->dbConnection->real_escape_string($data['accountType']), $this->dbConnection->real_escape_string($data['routingNumber']),
$this->dbConnection->real_escape_string($data['accountNumber']), $this->dbConnection->real_escape_string($data['bankMonths']), $this->dbConnection->real_escape_string($data['bankYears']), $this->dbConnection->real_escape_string($data['outStandingAmt']), $this->dbConnection->real_escape_string($data['activeChecking']), $this->dbConnection->real_escape_string($data['refFirstName']), $this->dbConnection->real_escape_string($data['refLastName']), $this->dbConnection->real_escape_string($data['phone']),
$this->dbConnection->real_escape_string($data['relationship']), $this->dbConnection->real_escape_string($data['flag']), $this->dbConnection->real_escape_string($data['results']), $this->dbConnection->real_escape_string($data['code'])    
);
			$this->dbConnection->query($qry);
			// check for error
			if(!$this->dbConnection->errno) {
				// return the new id
				$returnId = $this->dbConnection->insert_id;
			} else {
				$returnId = 0;
			}
		}
		return $returnId;
	}
	

}