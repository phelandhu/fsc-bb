<?php
// member.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/member.class.php");


class MemberTest extends PHPUnit_Framework_TestCase {
	private $_member = null;
	
	public function setUp()
	{
		$this->_member = new Member($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["database"]);
	}
	
	public function tearDown()
	{
		unset($this->_member);
	}
	
	public function testGetOneById() {
		$result = $this->_member->getOneById(1);
		$row = $result->fetch_array();
		$this->assertEquals("Micheal",$row['firstName']);
	}
	
	public function testGetOneByUsernameAndPassword() {
		$result = $this->_member->getOneByUsernameAndPassword("TestMan", hash('sha512', 'test'));
		$row = $result->fetch_array();
		$this->assertEquals("Test",$row['firstName']);
	}
/*
	public function testSave() {
		$data['username'] = "TestMan";
		$data['password'] = hash('sha512', 'test');
		$data['cookie'] = '';
		$data['session'] = '';
		$data['ip'] = '';
		$data['firstName'] = "Test";
		$data['lastName'] = "Von Testington";
		$data['emailAddress'] = "test@test.com";
		$data['cellPhoneNumber'] = "2125551212";
		$data['leadProviderId'] = 2;		
		$result = $this->_member->save($data);
	}

	public function testUpdateSave() {
		$data['id'] = 2;
		$data['username'] = "TestV1";
		$data['password'] = hash('sha512', 'test');
		$data['cookie'] = '';
		$data['session'] = '';
		$data['ip'] = '';
		$data['firstName'] = "Test";
		$data['lastName'] = "Von Testington";
		$data['emailAddress'] = "test@test.com";
		$data['cellPhoneNumber'] = "2125551212";
		$data['leadProviderId'] = 4;
		$result = $this->_member->save($data);
	}
*/	
}