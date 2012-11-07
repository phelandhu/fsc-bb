<?php
// rules.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/rules.class.php");


class RulesTest extends PHPUnit_Framework_TestCase {
	private $_rules = null;
	
	public function setUp()
	{
		$this->_rules = new Rules($GLOBALS["dbDataArr"]);
	}
	
	public function tearDown()
	{
		unset($this->_rules);
	}
	
	public function testGetOneById() {
		$result = $this->_rules->getOneById(1);
		$row = $result->fetch_array();
		$this->assertEquals("Reject loan if email includes .mil ",$row['Title']);
	}
/*	
	public function testSave() {
		$data['title'] = "My Test Rule";
		$data['ruleDescription'] = "My Test Rule";
		$data['phpLocation'] = "myTestRule";
		$data['value'] = "mtr";
		$data['fieldName'] = "email";
		$result = $this->_rules->save($data);
	}

	public function testUpdateSave() {
		$result = $this->_rules->getOneById(1);
		$data = $result->fetch_array();
		$data['comment'] = "Test of the do";
		$result = $this->_rules->save($data);
		echo "\n" . $result;
	}
*/	
	public function testGetRulesByMemberId() {
		$result = $this->_rules->getRulesByMemberId(1);
		$row = $result->fetch_array();
		$this->assertEquals("Reject loan if email includes .mil ",$row['Title']);
	}
}