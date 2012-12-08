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
	
	public function setUp()
	{
		global $ROOT_DIR;
		$this->_rulesManagementSet = new RulesManagementSet($GLOBALS["dbDataArr"]);
	}
	
	public function tearDown()
	{
		unset($this->_rulesManagementSet);
	}
/*	
	public function testGetOneById() {
		$result = $this->_rulesManagementSet->getOneById(284);
		$row = $result->fetch_array();
		$this->assertEquals("Sample Rule Set D",$row['Title']);
	}
	*/
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
	/*
	public function testSave() {
		$data['title'] = "Test group five";
		$data['active'] = 1;
		$data['memberId'] = 1;
		$result = $this->_rulesManagementSet->save($data);
		echo "New RMS ID: ", $result, "\n";
	}
*/	
	/*
	public function testUpdateSave() {
		$result = $this->_rulesManagementSet->getOneById(284);
		$data = $result->fetch_array();
		$data['comment'] = "This is the do";	
		$result = $this->_rulesManagementSet->save($data);
	}
	*/

	public function testSaveNewSet() {
		$data = array('RuleSetTitle' => 'Test eight',
    				  'RulesManagementSetListing' => '', 
    				  'defaultrule' => 0,
					  'memberID' => 1,
					  'rulesID' => array(
					  		1=>1, 2=>1, 3=>1, 4=>1, 6=>1, 10=>0
					  		)
					   );
		
		$this->_rulesManagementSet->saveNewSet($data);
	}
/*	
	public function testGetSet () {
		$arrResult = array();
		$rulesManagementSetId = 284;
		$result = $this->_rulesManagementSet->getSet($rulesManagementSetId);
		
		while($row = $result->fetch_array()) {
			$arrResult[] = $row['0'];
		}
		print_r($arrResult);
	}
	*/
}