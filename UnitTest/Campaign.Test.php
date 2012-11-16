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
include ("../common/classes/campaign.class.php");


class CampaignTest extends PHPUnit_Framework_TestCase {
	private $_campaign = null;
	
	public function setUp()
	{
		$this->_campaign = new Campaign($GLOBALS["dbDataArr"]);
	}
	
	public function tearDown()
	{
		unset($this->_campaign);
	}
	
	public function testGetOneById() {
		$result = $this->_campaign->getOneById(26);
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
/*	
	public function testSave() {
		$data['name'] = "Test Campaign 2";
		$data['active'] = 1;
		$data['leadProviderId'] = 1;
		$data['purchasePrice'] = .54;
		$data['startDate'] = 'now()';
		$data['currency'] = 'USD';
	
		$result = $this->_campaign->save($data);
	}
*/	
}