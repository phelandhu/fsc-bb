<?php
// bankingInformation.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/bankingInformation.class.php");

class BankingInformationTest extends PHPUnit_Framework_TestCase {
	private $_bankingInformation = null;
	
	public function setUp()
	{
		$this->_bankingInformation = new BankingInformation($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["database"]);
	}
	
	public function tearDown()
	{
		unset($this->_bankingInformation);
	}
/*	
	public function testGetOneByNameAndId() {
		$result = $this->_leadProvider->getOneByNameAndId("test",2);
		$row = $result->fetch_array();
		print_r($row);
	}
*/	
	public function testGetOneById() {
		$result = $this->_bankingInformation->getOneById(1);
		$row = $result->fetch_array();
		$this->assertEquals("Test Fargo",$row['bankName']);
	}
/*	
	public function testSave() {
		$data['personalInformationId'] = 12;
		$data['accountHolder'] = "Test Account";
		$data['bankName'] = "Test Fargo";
		$data['bankPhone'] = "714-555-1212";
		$data['accountType'] = "checking";
		$data['routingNumber'] = "657968345";
		$data['accountNumber'] = "949852136";
		$data['bankMonths'] = 24;
		$data['bankYears'] = 2;
		$data['outstandingAmt'] = 234;
		$data['activeChecking'] = 1;
		
		
		$result = $this->_bankingInformation->save($data);
	}
*/	
	
}