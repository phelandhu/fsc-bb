<?php
// leadProvider.Test.php
/***********************************************
* Created:            Oct 30, 2012 4:59:36 PM
* Last Modified:      Oct 30, 2012 4:59:36 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/leadProvider.class.php");


class LeadProviderTest extends PHPUnit_Framework_TestCase {
	private $_leadProvider = null;
	private $host = 'localhost'; // Host name Normally 'LocalHost'
	private $user = 'bb_user'; // MySQL login username
	private $pass = 'Keyb0ard!'; // MySQL login password
	private $database = 'BlackBoxDev'; // Database name
	
	public function setUp()
	{
		global $ROOT_DIR;
		$this->_leadProvider = new LeadProvider($this->host, $this->user, $this->pass, $this->database);
	}
	
	public function tearDown()
	{
		unset($this->_leadProvider);
	}
	
	public function testGetOneByNameAndId() {
		$result = $this->_leadProvider->getOneByNameAndId("Montgomery",2);
		print_r($result);
		echo "Hello world";
	}
}