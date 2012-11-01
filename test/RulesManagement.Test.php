<?php
// rulesManagementSet.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/rulesManagementSet.class.php");


class RulesManagementSetTest extends PHPUnit_Framework_TestCase {
	private $_rulesManagementSet = null;
	private $host = 'localhost'; // Host name Normally 'LocalHost'
	private $user = 'bb_user'; // MySQL login username
	private $pass = 'Keyb0ard!'; // MySQL login password
	private $database = 'BlackBoxDev'; // Database name
	
	public function setUp()
	{
		global $ROOT_DIR;
		$this->_rulesManagementSet = new RulesManagementSet($this->host, $this->user, $this->pass, $this->database);
	}
	
	public function tearDown()
	{
		unset($this->_rulesManagementSet);
	}
	
	public function testGetOneById() {
		$result = $this->_rulesManagementSet->getOneById(284);
		$row = $result->fetch_array();
		$this->assertEquals("Sample Rule Set D",$row['title']);
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
		
		
		$result = $this->_rulesManagementSet->save($data);
	}
*/	
	public function testSave() {
		$result = $this->_rulesManagementSet->getOneById(284);
		$data = $result->fetch_array();
		$data['comment'] = "This is the do";	
		$result = $this->_rulesManagementSet->save($data);
	}
}