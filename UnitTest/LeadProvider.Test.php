<?php
// leadProvider.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/leadProvider.class.php");


class LeadProviderTest extends PHPUnit_Framework_TestCase {
	private $_leadProvider = null;
	
	public function setUp()
	{
		$this->_leadProvider = new LeadProvider($GLOBALS["dbDataArr"]);
	}
	
	public function tearDown()
	{
		unset($this->_leadProvider);
	}
/*	
	public function testGetOneByNameAndId() {
		$result = $this->_leadProvider->getOneByNameAndId("test",2);
		$row = $result->fetch_array();
		print_r($row);
	}
*/	
	public function testGetOneByUsernameAndId() {
		$result = $this->_leadProvider->getOneByUsernameAndId("Montgomery",2);
//		$row = $result->fetch_array();
//		$this->assertEquals("Montgomery",$row['companyName']);
	}
	
	public function testGetOneById() {
		$result = $this->_leadProvider->getOneById(2);
		$row = $result->fetch_array();
		$this->assertEquals("Montgomery",$row['CompanyName']);
	}
/*	
	public function testSave() {
		$data['companyName'] = "Test Co.";
		$data['primaryPhoneNumber'] = "555-1212";
		$data['technicalPocName'] = "Tech Von Testington";
		$data['technicalPocEmailAddress'] = "test@test.com";
		$data['salesPocName'] = "Sales Von Testington";
		$data['salesPocEmailAddress'] = "sales@test.com";
		$data['integrationDate'] = "now()";
		$data['apiField1'] = "59686934asdf";
		$data['apiField2'] = "werjwe90342d";
		$data['sendingUrl'] = "www.test.com/send";
//		$result = $this->_leadProvider->save($data);
	}
*/

	public function testGetOneByMemberId() {
		$result = $this->_leadProvider->getOneByMemberId(1);
		$row = $result->fetch_array();
		$this->assertEquals("Digimarc",$row['CompanyName']);
	}	
	
}