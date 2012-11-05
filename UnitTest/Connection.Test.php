<?php
// Connection.Test.php
/***********************************************
* Created:            Nov 5, 2012 1:41:11 PM
* Last Modified:      Nov 5, 2012 1:41:11 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/rules.class.php");


class RulesTest extends PHPUnit_Framework_TestCase {
	private $_rules = null;
	private $_connection;
	
	public function setUp()
	{
		$this->_connection = $GLOBALS["dbData"];
		//$this->_rules = new Rules($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["database"]);
	}
	
	public function tearDown()
	{
		//unset($this->_rules);
	}
	
	public function testConnection() {
		echo $this->_connection->getHostName();
	}
}