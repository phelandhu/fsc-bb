<?php
// Campaigns.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/campaigns.class.php");


class CampaignsTest extends PHPUnit_Framework_TestCase {
	private $_campaigns = null;
	
	public function setUp()
	{
		$this->_campaigns = new Campaigns($GLOBALS["dbDataArr"]);
	}
	
	public function tearDown()
	{
		unset($this->_campaigns);
	}
	
	public function testGetOneById() {
		$result = $this->_campaigns->getOneById(26);
		$row = $result->fetch_array();
		$this->assertEquals("Mike Test",$row['Name']);
	}
/*
	public function testSetInactive() {
		$this->_campaigns->setInactive(26);
	}

	public function testSetActive() {
		$this->_campaigns->setActive(26);
	}
	
*/
	
	public function testSave() {
		$data['name'] = "Test Campaign";
		$data['active'] = 1;
		$data['leadProviderId'] = 1;
		$data['purchasePrice'] = .54;
		$data['startDate'] = 'now()';
		$data['currency'] = 'USD';
	
		$result = $this->_campaigns->save($data);
	}
	
}