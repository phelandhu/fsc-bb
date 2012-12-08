<?php
// VendorPostTo.Test.php
/***********************************************
* Created:            Dec 7, 2012 4:04:45 PM
* Last Modified:      Dec 7, 2012 4:04:45 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
require_once ("../bootstrap.php");
require_once ("../common/classes/vendorPostTo.class.php");


class VendorPostToTest extends PHPUnit_Framework_TestCase {
	private $_vendorPostTo = null;
	
	public function setUp()
	{
		global $ROOT_DIR;
		$this->_vendorPostTo = new VendorPostTo($GLOBALS["dbDataArr"]);
	}
	
	public function tearDown()
	{
		unset($this->_vendorPostTo);
	}
	
	public function testSave() {
		$data = array('vendorPostTo' => 'EPIC', 
				'response' => 'Success', 
				'urlPostedTo' => 'www.epic.com/api/test/data');
		$this->_vendorPostTo->save($data);
	}
}