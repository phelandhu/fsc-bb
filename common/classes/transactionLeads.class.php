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
	protected $self = "Transactions_Leads";

	public function save($data) { // not working yet.
		global $log;
		file_put_contents("/tmp/log.txt", file_get_contents("/tmp/log.txt") . "Output of Data\n" . print_r($data, true));
//		$log->error(print_r($data, true));
		// I am creating a xover table between this and rules.
		$returnId = null;
		if(isset($data['id'])) {
			$this->lastSQL = sprintf("UPDATE %s  SET
						`name` = '%s', `comment` = '%s',
`apiUserName` = '%s', `apiPassWord` = '%s', `STOREKEY` = '%s', `REFURL` = '%s', `IPADDRESS` = '%s',
`TIERKEY` = '%s', `AFFID` = '%s', `SUBID` = '%s', `TEST` = '%s', `REQUESTEDAMOUNT` = '%s', `SSN` = '%s', `DOB` = '%s', `GENDER` = '%s',
`FIRSTNAME` = '%s', `LASTNAME` = '%s', `ADDRESS` = '%s', `CITY` = '%s', `STATE` = '%s', `HOMEPHONE` = '%s', `OTHERPHONE` = '%s', `DLSTATE` = '%s',
`DLNUMBER` = '%s', `CONTACTTIME` = '%s', `ADDRESSMONTHS` = '%s', `ADDRESSYEARS` = '%s', `RENTOROWN` = '%s', `ISMILITARY` = '%s', `ISCITIZEN` = '%s', `OTHEROFFERS` = '%s',
`EMAIL` = '%s', `INCOMETYPE` = '%s', `PAYTYPE` = '%s', `EMPMONTHS` = '%s', `EMPYEARS` = '%s', `EMPNAME` = '%s', `EMPADDRESS` = '%s', `EMPADDRESS2` = '%s',
`EMPCITY` = '%s', `EMPSTATE` = '%s', `EMPZIP` = '%s', `EMPPHONE` = '%s', `EMPPHONEEXT` = '%s', `EMPFAX` = '%s', `SUPERVISORNAME` = '%s', `SUPERVISORPHONE` = '%s',
`SUPERVISORPHONEEXT` = '%s', `HIREDATE` = '%s', `EMPTYPE` = '%s', `JOBTITLE` = '%s', `WORKSHIFT` = '%s', `PAYFREQUENCY` = '%s', `NETMONTHLY` = '%s', `GROSSMONTHLY` = '%s',
`LASTPAYDATE` = '%s', `NEXTPAYDATE` = '%s', `SECONDPAYDATE` = '%s', `ACCOUNTHOLDER` = '%s', `BANKNAME` = '%s', `BANKPHONE` = '%s', `ACCOUNTTYPE` = '%s', `ROUTINGNUMBER` = '%s',
`ACCOUNTNUMBER` = '%s', `BANKMONTHS` = '%s', `BANKYEARS` = '%s', `OUTSTANDINGAMT` = '%s', `ACTIVECHECKING` = '%s', `REFFIRSTNAME` = '%s', `REFLASTNAME` = '%s', `PHONE` = '%s',
`RELATIONSHIP` = '%s', `FLAG` = '%s', `RESULTS` = '%s', `CODE` = '%s'
					WHERE LeadsTransaction_PASSID = %s",
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
			$this->dbConnection->query($this->lastSQL);
			$returnId = $data['id'];
		} else {
			$this->lastSQL = sprintf("INSERT INTO %s
  ( `apiusername`, `apipassword`, `STOREKEY`, `REFURL`, `IPADDRESS`, `TIERKEY`, `AFFID`, `SUBID`, `TEST`, `REQUESTEDAMOUNT`, `SSN`, `DOB`, `GENDER`, 
  `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `CITY`, `STATE`, `HOMEPHONE`, `OTHERPHONE`, `DLSTATE`, `DLNUMBER`, `CONTACTTIME`, `ADDRESSMONTHS`, `ADDRESSYEARS`, 
  `RENTOROWN`, `ISMILITARY`, `ISCITIZEN`, `OTHEROFFERS`, `EMAIL`, `INCOMETYPE`, `PAYTYPE`, `EMPMONTHS`, `EMPYEARS`, `EMPNAME`, `EMPADDRESS`, `EMPADDRESS2`, 
  `EMPCITY`, `EMPSTATE`, `EMPZIP`, `EMPPHONE`, `EMPPHONEEXT`, `EMPFAX`, `SUPERVISORNAME`, `SUPERVISORPHONE`, `SUPERVISORPHONEEXT`, `HIREDATE`, `EMPTYPE`, 
  `JOBTITLE`, `WORKSHIFT`, `PAYFREQUENCY`, `NETMONTHLY`, `GROSSMONTHLY`, `LASTPAYDATE`, `NEXTPAYDATE`, `SECONDPAYDATE`, `ACCOUNTHOLDER`, `BANKNAME`, 
  `BANKPHONE`, `ACCOUNTTYPE`, `ROUTINGNUMBER`, `ACCOUNTNUMBER`, `BANKMONTHS`, `BANKYEARS`, `OUTSTANDINGAMT`, `ACTIVECHECKING`, `REFFIRSTNAME`, 
  `REFLASTNAME`, `PHONE`, `RELATIONSHIP`, `RESULTS`, `DATETIME`)
VALUES
  ( '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
	'%s', '%s', now())",
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
$this->dbConnection->real_escape_string($data['relationship']), $data['results']);
			$this->dbConnection->query($this->lastSQL);
			
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
	
	public function getOneByID($id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE LeadsTransaction_PASSID = %s", $this->self, $id));
	}
	
	public function convertLengthToYearMonth($length, &$years, &$months) {
			$years = (int)($length / 12);
			$months = $length % 12;
	}
	
	public function cleanData($data) {

		$response = null;
//		$response['apiUserName']
//		$response['apiPassWord']		
		$response['storeKey'] = $this->dbConnection->real_escape_string($data["REFERRAL_STOREKEY"]);
		$response['refUrl'] = $this->dbConnection->real_escape_string($data["REFERRAL_REFURL"]);
		$response['ipAddress'] = $this->dbConnection->real_escape_string($data["REFERRAL_IPADDRESS"]);
		$response['tierKey'] = $this->dbConnection->real_escape_string($data["REFERRAL_TIERKEY"]);
		$response['affId'] = $this->dbConnection->real_escape_string($data["REFERRAL_AFFID"]);
		$response['subId'] = $this->dbConnection->real_escape_string($data["REFERRAL_SUBID"]);
		$response['test'] = $this->dbConnection->real_escape_string($data["REFERRAL_TEST"]);
		$response['requestedAmount'] = $this->dbConnection->real_escape_string($data["PERSONAL_REQUESTEDAMOUNT"]);
		$response['ssn'] = $this->dbConnection->real_escape_string($data["PERSONAL_SSN"]);
		$response['dob'] = $this->dbConnection->real_escape_string($data["PERSONAL_DOB"]);
		$response['gender'] = $this->dbConnection->real_escape_string($data["PERSONAL_GENDER"]);
		$response['firstName'] = $this->dbConnection->real_escape_string($data["PERSONAL_FIRSTNAME"]);
		$response['middleInitial'] = $this->dbConnection->real_escape_string($data["PERSONAL_MIDDLEINITIAL"]);
		$response['lastName'] = $this->dbConnection->real_escape_string($data["PERSONAL_LASTNAME"]);
		$response['address'] = $this->dbConnection->real_escape_string($data["PERSONAL_ADDRESS"]);
		$response['address'] = $this->dbConnection->real_escape_string($data["PERSONAL_ADDRESS2"]);
		$response['city'] = $this->dbConnection->real_escape_string($data["PERSONAL_CITY"]);
		$response['state'] = $this->dbConnection->real_escape_string($data["PERSONAL_STATE"]);
		$response['zip'] = $this->dbConnection->real_escape_string($data["PERSONAL_ZIP"]);
		$response['homePhone'] = $this->dbConnection->real_escape_string($data["PERSONAL_HOMEPHONE"]);
		$response['otherPhone'] = $this->dbConnection->real_escape_string($data["PERSONAL_OTHERPHONE"]);
		$response['dlState'] = $this->dbConnection->real_escape_string($data["PERSONAL_DLSTATE"]);
		$response['dlNumber'] = $this->dbConnection->real_escape_string($data["PERSONAL_DLNUMBER"]);
		$response['contactTime'] = $this->dbConnection->real_escape_string($data["PERSONAL_CONTACTTIME"]);
		$this->convertLengthToYearMonth($data["PERSONAL_LENGTHATRESIDENCE"], $response['addressYears'], $response['addressMonths']);
		$response['rentOrOwn'] = $this->dbConnection->real_escape_string($data["PERSONAL_RENTOROWN"]);
		$response['isMilitary'] = $this->dbConnection->real_escape_string($data["PERSONAL_ISMILITARY"]);
		$response['isCitizen'] = $this->dbConnection->real_escape_string($data["PERSONAL_ISCITIZEN"]);
		$response['otherOffers'] = $this->dbConnection->real_escape_string($data["PERSONAL_OTHEROFFERS"]);
		$response['email'] = $this->dbConnection->real_escape_string($data["PERSONAL_EMAIL"]);
//		 = $this->dbConnection->real_escape_string($data["PERSONAL_BANKRUPTCY"]);
		$response['incomeType'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_INCOMETYPE"]);
		$response['payType'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_PAYTYPE"]);
		$response['empMonths'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPMONTHS"]);
		$response['empYears'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPYEARS"]);
		$response['empName'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPNAME"]);
		$response['empAddress'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPADDRESS"]);
		$response['empAddress2'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPADDRESS2"]);
		$response['empCity'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPCITY"]);
		$response['empState'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPSTATE"]);
		$response['empZip'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPZIP"]);
		$response['empPhone'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPPHONE"]);
		$response['empPhoneExt'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPPHONEEXT"]);
		$response['empFax'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPFAX"]);
		$response['supervisorName'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_SUPERVISORNAME"]);
		$response['supervisorPhone'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_SUPERVISORPHONE"]);
		$response['supervisorPhoneExt'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_SUPERVISORPHONEEXT"]);
		$response['hireDate'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_HIREDATE"]);
		$response['empType'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_EMPTYPE"]);
		$response['jobTitle'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_JOBTITLE"]);
		$response['workShift'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_WORKSHIFT"]);
		$response['payFrequency'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_PAYFREQUENCY"]);
		$response['netMonthly'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_NETMONTHLY"]);
		$response['grossMonthly'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_GROSSMONTHLY"]);
		$response['lastPayDate'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_LASTPAYDATE"]);
		$response['nextPayDate'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_NEXTPAYDATE"]);
		$response['secondPayDate'] = $this->dbConnection->real_escape_string($data["EMPLOYMENT_SECONDPAYDATE"]);
		$response['accountHolder'] = $this->dbConnection->real_escape_string($data["BANK_ACCOUNTHOLDER"]);
		$response['bankName'] = $this->dbConnection->real_escape_string($data["BANK_BANKNAME"]);
		$response['bankPhone'] = $this->dbConnection->real_escape_string($data["BANK_BANKPHONE"]);
		$response['accountType'] = $this->dbConnection->real_escape_string($data["BANK_ACCOUNTTYPE"]);
		$response['routingNumber'] = $this->dbConnection->real_escape_string($data["BANK_ROUTINGNUMBER"]);
		$response['accountNumber'] = $this->dbConnection->real_escape_string($data["BANK_ACCOUNTNUMBER"]);
		$this->convertLengthToYearMonth($data["BANK_LENGTHBANKING"], $response['bankMonths'], $response['bankYears']);
		$response['outStandingAmt'] = $this->dbConnection->real_escape_string($data["BANK_OUTSTANDINGAMT"]);
		$response['activeChecking'] = $this->dbConnection->real_escape_string($data["BANK_ACTIVECHECKING"]);
		$response['refFirstName'] = $this->dbConnection->real_escape_string($data["1_FIRSTNAME"]);
		$response['refLastName'] = $this->dbConnection->real_escape_string($data["1_LASTNAME"]);
		$response['phone'] = $this->dbConnection->real_escape_string($data["1_PHONE"]);
		$response['relationship'] = $this->dbConnection->real_escape_string($data["1_RELATIONSHIP"]);
//		$response['flag']
		//$response['results']
//		$response['code']
		return $response;
	}
}