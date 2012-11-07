<?php
// passGood.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/passGood.class.php");

class PassGoodTest extends PHPUnit_Framework_TestCase {
	private $_passGood = null;
	
	public function setUp()
	{
		$this->_passGood = new PassGood($GLOBALS["dbDataArr"]);
	}
	
	public function tearDown()
	{
		unset($this->_passGood);
	}
	
	public function testGetOneById() {
		$result = $this->_passGood->getOneById(1);
		$row = $result->fetch_array();
		$this->assertEquals(2,$row['LeadProviderID']);
	}
	
/*
	public function testSave() {
		$data['personalInformationId'] = 0;
		$data['leadProviderId'] = 2;
		$data['memberId'] = 1;
		$data['resultXml'] = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>
<note>
	<to>Tove</to>
	<from>Jani</from>
	<heading>Reminder</heading>
	<body>Don't forget me this weekend!</body>
</note>";
	
	
		$result = $this->_passGood->save($data);
	}
*/
/*
	public function testUpdateSave() {
		$result = $this->_passGood->getOneById(1);
		$data = $result->fetch_array();
			
		$data['comment'] = "Just set to fail";
		$result = $this->_passGood->save($data);
	}
*/
}