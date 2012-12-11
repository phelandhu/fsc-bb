<?php
// transactionLeads.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/transactionLeads.class.php");


class TransactionLeadsTest extends PHPUnit_Framework_TestCase {
	private $_transactionLeads = null;
	
	public function setUp()
	{
		global $ROOT_DIR;
		$this->_transactionLeads = new TransactionLeads($GLOBALS["dbDataArr"]);
	}
	
	public function tearDown()
	{
		unset($this->_transactionLeads);
	}
	

	public function testGetOneById() {
		$result = $this->_transactionLeads->getOneById(2);
		$row = $result->fetch_array();
		$this->assertEquals("I5uHFVhfKGWpdXOr",$row['STOREKEY']);
	}
/*	
	public function testUpdateSave() {
		$result = $this->_transactionLeads->getOneById(16);
		$data = $result->fetch_array();
		$data['apiUserName'] = "TestAPIun";
		$data['apiPassWord'] = "TestAPIpw";
		$data['dlState'] = "CA";
		$data['dlNumber'] = "B265818";		
		$result = $this->_transactionLeads->save($data);
	}
*/

	public function testSave() {
		$data['apiUserName'] = "TestunAPI";
		$data['apiPassWord'] = "TestpwAPI";
		$data['storeKey'] = "sd56f4";
		$data['refUrl'] = "www.example.com/ref.php";
		$data['ipAddress'] = "127.0.0.1";
			$data['tierKey'] = "897asdf";
		$data['affId'] = "1";
		$data['subId'] = "34";
		$data['test'] = "1";
		$data['requestedAmount'] = "2000";
		$data['ssn'] = "555-26-7485";
		$data['dob'] = "06-14-1980";
		$data['gender'] = "M";
			$data['firstName'] = "Test";
		$data['lastName'] = "Testinghouse";
		$data['address'] = "1234 Tester street";
		$data['city'] = "Lehigh Acres";
		$data['state'] = "FL";
		$data['homePhone'] = "329-555-1212";
		$data['otherPhone'] = "329-555-8457";
		$data['dlState'] = "FL";
			$data['dlNumber'] = "B98684";
		$data['contactTime'] = "";
		$data['addressMonths'] = "4";
		$data['addressYears'] = "2";
		$data['rentOrOwn'] = "0";
		$data['isMilitary'] = "0";
		$data['isCitizen'] = "1";
		$data['otherOffers'] = "";
			$data['email'] = "test@test.com";
		$data['incomeType'] = "";
		$data['payType'] = "p";
		$data['empMonths'] = "11";
		$data['empYears'] = "6";
		$data['empName'] = "Tester Paint";
		$data['empAddress'] = "123459 Streat St";
		$data['empAddress2'] = "";
			$data['empCity'] = "LH";
		$data['empState'] = "FL";
		$data['empZip'] = "33915";
		$data['empPhone'] = "329-555-6958";
		$data['empPhoneExt'] = "";
		$data['empFax'] = "";
		$data['supervisorName'] = "Bob Tester";
		$data['supervisorPhone'] = "";
			$data['supervisorPhoneExt'] = "";
		$data['hireDate'] = "12-01-2005";
		$data['empType'] = "F";
		$data['jobTitle'] = "Paint Tester";
		$data['workShift'] = "S";
		$data['payFrequency'] = "B";
		$data['netMonthly'] = "2250";
		$data['grossMonthly'] = "3333";
			$data['lastPayDate'] = "10-31-2012";
		$data['nextPayDate'] = "11-15-2012";
		$data['secondPayDate'] = "11-30-2012";
		$data['accountHolder'] = "Test Testinghouse";
		$data['bankName'] = "Wells Fargo";
		$data['bankPhone'] = "714-555-1212";
		$data['accountType'] = "C";
		$data['routingNumber'] = "366548645";
			$data['accountNumber'] = "981238967";
		$data['bankMonths'] = "4";
		$data['bankYears'] = "1";
		$data['outStandingAmt'] = "123654";
		$data['activeChecking'] = "";
		$data['refFirstName'] = "Exam";
		$data['refLastName'] = "Testinghouse";
		$data['phone'] = "2125551212";
			$data['relationship'] = "Friend";
		$data['flag'] = "";
		$data['results'] = "";
		$data['code'] = "123456";
		
		$resultId = $this->_transactionLeads->save($data);
		echo $this->_transactionLeads->getLastSQL();
		$result = $this->_transactionLeads->getOneById($resultId);
		$row = $result->fetch_array();
		
		$this->assertEquals("sd56f4",$row['STOREKEY']);
		
	}

	public function testConvertLengthToYearMonth() {
		$length = 25;
		$year = 0;
		$month = 0;
		$this->_transactionLeads->convertLengthToYearMonth($length, $year, $month);
		$this->assertEquals(2,$year);
		$this->assertEquals(1,$month);
	}
	
}