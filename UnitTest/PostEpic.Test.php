<?php
// PostEpic.Test.php
/***********************************************
* Created:            Dec 7, 2012 11:40:47 AM
* Last Modified:      Dec 7, 2012 11:40:47 AM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/postEpic.class.php");

class CommHTTPTest extends PHPUnit_Framework_TestCase {
	private $_postEpic = null;
	private $_data;
	private $self;

	public function setUp()
	{
		$this->_postEpic = new PostEPIC();
		$this->_data = file_get_contents("../test/xml_data_text.php");
		
	}

	public function tearDown()
	{
		//unset($this->_rules);
	}

	public function testMessage() {
		$this->_postEpic->setUrl("fsc-bb/recData.php?test=true");
		$this->_postEpic->setUrl("fsc-bb/recData.php?test=true");
		$this->_postEpic->setData("postData=" . $this->_data);
		echo $this->_postEpic->post2EPIC(true);
	}
}