<?php
// CommHTTP.Test.php
/***********************************************
* Created:            Nov 27, 2012 11:49:39 AM
* Last Modified:      Nov 27, 2012 11:49:39 AM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/commHTTP.class.php");

class CommHTTPTest extends PHPUnit_Framework_TestCase {
	private $_commHTTP = null;
	private $_data;
	private $self;
	
	public function setUp()
	{
		$this->_commHTTP = new CommHTTP();
		$this->_data = file_get_contents("../test/xml_data_text.php");
	}
	
	public function tearDown()
	{
		//unset($this->_rules);
	}
	
	public function testMessage() {
		$this->_commHTTP->setUrl("fsc-bb/test/landingPage.php?test=true");
//		$this->_commHTTP->setData($this->_data);
		echo $this->_commHTTP->sendMessage(true);
	}
}